<?php

namespace MyProject\Models\Works;
use MyProject\Models\ActiveRecordEntity;

class Work extends ActiveRecordEntity
{
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCreated()
    {
        return $this->created;
    }
    public function getChecklist()
    {
        return $this->checklist;
    }
    public function getType()
    {
        return $this->type;
    }
    public function getHotel()
    {
        return $this->hotel;
    }
    public function getStaffType()
    {
        return $this->staff_type;
    }
    protected static function getTableName()
    {
        return 'works';
    }
}