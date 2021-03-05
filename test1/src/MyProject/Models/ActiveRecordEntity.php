<?php

namespace MyProject\Models;

use MyProject\Services\Db;

abstract class ActiveRecordEntity
{
    protected $id;

    public function getId()
    {
        return $this->id;
    }

    public static function findAll()
    {
        $db = Db::getInstance();
        return $db->query('SELECT * FROM `' . static::getTableName() . '`' , [], static::class);
    }

    public static function updateEmployee()
    {
        if($_POST['args'][5]=='м') $_POST['args'][5]=0;
        else $_POST['args'][5]=1;
        $sql = 'UPDATE ' . static::getTableName() . ' SET `surname`=:surname,`name`=:name,`patronymic`=:patronymic,`birthdate`=:birthdate,`gender`=:gender WHERE id =:id ';
        $db = Db::getInstance();
        $db->query($sql, [':surname'=>$_POST['args'][1],':name'=>$_POST['args'][2],':patronymic'=>$_POST['args'][3],':birthdate'=>$_POST['args'][4],':gender'=>$_POST['args'][5],':id'=>$_POST['args'][0] ], static::class);
    }

    public static function updateJob()
    {
        $sql = 'UPDATE ' . static::getTableName() . ' SET `job_start`=:job_start,`job_end`=:job_end,`organization_name`=:organization_name WHERE id =:id ';
        $db = Db::getInstance();
        $db->query($sql, [':job_start'=>$_POST['args'][1],':job_end'=>$_POST['args'][2],':organization_name'=>$_POST['args'][3],':id'=>$_POST['args'][0] ], static::class);
    }

    public static function getById(int $id)
    {
        $db = Db::getInstance();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE id=:id;',
            [':id' => $id],
            static::class
        );
        return $entities ? $entities : null;
    }
    public static function getJobsById(int $id)
    {
        $db = Db::getInstance();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE employee_id=:id;',
            [':id' => $id],
            static::class
        );
        return $entities ? $entities : null;
    }

    public static function insertEmployee($args)
    {
        if($args[4]=='м') $args[4]=0;
        else $args[4]=1;
        $sql = 'INSERT INTO ' . static::getTableName() . '(`surname`,`name`,`patronymic`,`birthdate`,`gender`) VALUES (:surname,:name,:patronymic,:birthdate,:gender);';

        $db = Db::getInstance();
        $db->query($sql, [':surname'=>$args[0],':name'=>$args[1],':patronymic'=>$args[2], ':birthdate'=>$args[3],':gender'=>$args[4]], static::class);
    }

    public function deleteEmployee(int $id)
    {
        $db = Db::getInstance();
        $db->query(
            'DELETE FROM `' . static::getTableName() . '` WHERE id = :id',
            [':id' => $id]
        );
    }
    public function deleteJob(int $id)
    {
        $db = Db::getInstance();
        $db->query(
            'DELETE FROM `' . static::getTableName() . '` WHERE id = :id',
            [':id' => $id]
        );
    }
    public function deleteJobsByEmployeeId(int $id)
    {
        $db = Db::getInstance();
        $db->query(
            'DELETE FROM `' . static::getTableName() . '` WHERE employee_id = :id',
            [':id' => $id]
        );
    }
    public static function insertJob($args,$arg)
    {
        $sql = 'INSERT INTO ' . static::getTableName() . '(`employee_id`,`job_start`,`job_end`,`organization_name`) VALUES (:employee_id,:job_start,:job_end,:organization_name);';

        $db = Db::getInstance();
        $db->query($sql, [':employee_id'=>$arg,':job_start'=>$args[0],':job_end'=>$args[1], ':organization_name'=>$args[2]], static::class);
    }

    abstract protected static function getTableName();

}