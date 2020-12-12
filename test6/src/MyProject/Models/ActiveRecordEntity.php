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
        return $db->query('SELECT * FROM `' . static::getTableName() . '`;', [], static::class);
    }
    public static function getStaffById(int $id, string $start, string $end)
    {
        $db = Db::getInstance();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE staff=:id AND start>=:start AND end<=:end ;',
            [':id' => $id, ':start' => $start, ':end' => $end],
            static::class
        );
        return $entities ? $entities : null;
    }
    public static function getStaffByIdForOneDay(int $id, string $date)
    {
        $db = Db::getInstance();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE staff=:id AND :date1>end AND :date2<created;',
            [':id' => $id, ':date1' => $date.' 23:59:59', ':date2' => $date.' 00:00:00'],
            static::class
        );
        return $entities ? $entities : null;
    }
    public static function getRoomNum(int $room)
    {
        $db = Db::getInstance();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE id=:room;',
            [':room'=>$room],
            static::class
        );
        return $entities ? $entities[0] : null;
    }
    public static function getPrices(int $type,int $work)
    {
        $db = Db::getInstance();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE room_type=:type AND work=:work;',
            [':type'=>$type, ':work'=>$work],
            static::class
        );
        return $entities ? $entities[0] : null;
    }
    public static function getUserByName(string $name)
    {
        $db = Db::getInstance();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE name=:name;',
            [':name' => $name],
            static::class
        );
        return $entities ? $entities[0] : null;
    }
    abstract protected static function getTableName();
}