<?php

namespace MyProject\Models\Prices;
use MyProject\Models\ActiveRecordEntity;

class Price extends ActiveRecordEntity
{
    public function getId()
    {
        return $this->id;
    }

    public function getRoomType()
    {
        return $this->room_type;
    }

    public function getWork()
    {
        return $this->work;
    }
    public function getHotel()
    {
        return $this->hotel;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getTime()
    {
        return $this->time;
    }
    public function getChecklist()
    {
        return $this->checklist;
    }
    protected static function getTableName()
    {
        return 'prices';
    }
}