<?php

namespace MyProject\Models\Employees;
use MyProject\Models\ActiveRecordEntity;

class Employee extends ActiveRecordEntity
{
    public function getId()
    {
        return $this->id;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getName()
    {
        return $this->name;
    }
    public function getPatronymic()
    {
        return $this->patronymic;
    }
    public function getBirthdate()
    {
        return $this->birthdate;
    }
    public function getGender()
    {
        return $this->gender;
    }
    protected static function getTableName()
    {
        return 'employee';
    }
}