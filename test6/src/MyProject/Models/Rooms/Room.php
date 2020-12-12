<?php

namespace MyProject\Models\Rooms;
use MyProject\Models\ActiveRecordEntity;

class Room extends ActiveRecordEntity
{
    public function getId()
    {
        return $this->id;
    }

    public function getNum()
    {
        return $this->num;
    }

    public function getCreated()
    {
        return $this->created;
    }
    public function getBuild()
    {
        return $this->build;
    }
    public function getType()
    {
        return $this->type;
    }
    public function getFloor()
    {
        return $this->floor;
    }
    public function getSort()
    {
        return $this->sort;
    }
    protected static function getTableName()
    {
        return 'rooms';
    }
}