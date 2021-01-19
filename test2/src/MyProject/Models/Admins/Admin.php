<?php
namespace MyProject\Models\Admins;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;
use MyProject\Exceptions\InvalidArgumentException;

class Admin extends ActiveRecordEntity
{
    public static function login():Admin{
        $admin=new Admin();
        return $admin;
    }
    protected static function getTableName():string{
        return 'articles';
    }
}