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

    public static function findAll($limit)
    {
        $db = Db::getInstance();
        return $db->query('SELECT * FROM `' . static::getTableName() . '` ORDER BY DATE_CREATE DESC LIMIT ' . $limit, [], static::class);
    }


    public static function hide($id)
    {
        $sql = 'UPDATE ' . static::getTableName() . ' SET `VISIBILITY`=0 WHERE id = ' . $id;
        $db = Db::getInstance();
        $db->query($sql, [], static::class);
    }

    public static function addQuantity($id, $quantity)
    {
        $quantity=$quantity+1;
        $sql = 'UPDATE ' . static::getTableName() . ' SET `PRODUCT_QUANTITY`=' . $quantity .  ' WHERE id = ' . $id;
        $db = Db::getInstance();
        $db->query($sql, [], static::class);
    }

    public static function deleteQuantity($id, $quantity)
    {
        $quantity=$quantity-1;
        $sql = 'UPDATE ' . static::getTableName() . ' SET `PRODUCT_QUANTITY`=' . $quantity .  ' WHERE id = ' . $id;
        $db = Db::getInstance();
        $db->query($sql, [], static::class);
    }

    public static function getById(int $id)
    {
        $db = Db::getInstance();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE id=:id;',
            [':id' => $id],
            static::class
        );
        return $entities ? $entities[0] : null;
    }

    abstract protected static function getTableName();

}