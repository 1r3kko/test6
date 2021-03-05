<?php

namespace MyProject\Models\Jobs;
use MyProject\Models\ActiveRecordEntity;

class Job extends ActiveRecordEntity
{
    public function getId()
    {
        return $this->id;
    }

    public function getEmployeeId()
    {
        return $this->employee_id;
    }

    public function getJobStart()
    {
        return $this->job_start;
    }
    public function getJobEnd()
    {
        return $this->job_end;
    }
    public function getOrganizationName()
    {
        return $this->organization_name;
    }

    protected static function getTableName()
    {
        return 'previous_jobs';
    }
}