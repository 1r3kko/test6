<?php

namespace MyProject\Models\Users;
use MyProject\Models\ActiveRecordEntity;

class User extends ActiveRecordEntity
{
    public function getId()
    {
        return $this->id;
    }
    public function getCreated()
    {
        return $this->created;
    }

    public function getName()
    {
        return $this->name;
    }
    public function getLogin()
    {
        return $this->login;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getType()
    {
        return $this->type;
    }
    public function getActive()
    {
        return $this->active;
    }
    public function getHotel()
    {
        return $this->hotel;
    }
    protected static function getTableName()
    {
        return 'users';
    }
}