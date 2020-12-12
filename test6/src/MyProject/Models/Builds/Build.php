<?php

namespace MyProject\Models\Builds;
use MyProject\Models\ActiveRecordEntity;

class Build extends ActiveRecordEntity
{
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getHotel()
    {
        return $this->hotel;
    }
    public function getCreated()
    {
        return $this->created;
    }
    protected static function getTableName()
    {
        return 'builds';
    }
}