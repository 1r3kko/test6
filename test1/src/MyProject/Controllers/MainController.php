<?php

namespace MyProject\Controllers;

use MyProject\Models\Employees\Employee;
use MyProject\Models\Jobs\Job;
use MyProject\View\View;

class MainController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    public function main()
    {
        $employees = Employee::findAll();
        $this->view->renderHtml('main/main.php', ['employees' => $employees]);
    }

    public function deleteEmployee(int $id)
    {
        Employee::deleteEmployee($id);
        Job::deleteJobsByEmployeeId($id);
        $resData=array();
        if (!Employee::getById($id)){
            $resData['success']=1;
        } else{
            $resData['success']=0;
        }
        echo json_encode($resData);
    }
    public function deleteJob(int $id)
    {
        Job::deleteJob($id);
        $resData=array();
        if (!Job::getById($id)){
            $resData['success']=1;
        } else{
            $resData['success']=0;
        }
        echo json_encode($resData);
    }
    public function updateEmployee()
    {
        Employee::updateEmployee($_POST['args']);
        $resData=array();
        if ($resData){
            $resData['success']=1;
        } else{
            $resData['success']=0;
        }
        echo json_encode($_POST['args']);
    }
    public function updateJob()
    {
        Job::updateJob($_POST['args']);
        $resData=array();
        if ($resData){
            $resData['success']=1;
        } else{
            $resData['success']=0;
        }
        echo json_encode($_POST['args']);
    }
    public function previousJob(int $id)
    {
        $jobsId=Job::getJobsById($id);
        $this->view->renderHtml('main/previous_jobs.php', ['jobsId' => $jobsId, 'employeeId'=>$id]);
    }
    public function editEmployee(int $id)
    {
        $employeeId=Employee::getById($id);
        $this->view->renderHtml('main/employee_template.php', ['employeeId' => $employeeId]);
    }
    public function addEmployee()
    {
        $this->view->renderHtml('main/add_employee.php', []);
    }
    public function addJob(int $id)
    {
        $this->view->renderHtml('main/add_job.php', ['employeeId' => $id]);
    }
    public function insert(int $arg)
    {
        if ($arg==0) Employee::insertEmployee($_POST['args']);
        else Job::insertJob($_POST['args'],$arg);
        $resData=array();
        if ($resData){
            $resData['success']=1;
        } else{
            $resData['success']=0;
        }
        echo json_encode($resData);
    }
    public function editJob(int $id)
    {
        $jobId=Job::getById($id);
        $this->view->renderHtml('main/previous_job.php', ['jobId' => $jobId]);
    }
}