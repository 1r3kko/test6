<?php

namespace MyProject\Models\Statistics;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Rooms\Room;
use MyProject\Models\Prices\Price;

class Statistic extends ActiveRecordEntity
{
    public function getId()
    {
        return $this->id;
    }

    public function getRoom()
    {
        return $this->room;
    }
    public function getCreated()
    {
        return $this->created;
    }
    public function getCreatedBy()
    {
        return $this->created_by;
    }
    public function getAssigned()
    {
        return $this->assigned;
    }
    public function getAssignedBe()
    {
        return $this->assigned_by;
    }
    public function getModified()
    {
        return $this->modified;
    }
    public function getModifiedBy()
    {
        return $this->modified_by;
    }
    public function getStart()
    {
        return $this->start;
    }
    public function getEnd()
    {
        return $this->end;
    }
    public function getWork()
    {
        return $this->work;
    }
    public function getStaff()
    {
        return $this->staff;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function getMark()
    {
        return $this->mark;
    }
    public function getBed()
    {
        return $this->bed;
    }
    public function getTowels()
    {
        return $this->towels;
    }
    public function getSince()
    {
        return $this->since;
    }
    public function getTill()
    {
        return $this->till;
    }
    public function getBeds()
    {
        return $this->beds;
    }
    public function getReturn()
    {
        return $this->return;
    }
    public function getScore()
    {
        return $this->score;
    }
    public function getApproved()
    {
        return $this->approved;
    }
    public function getPricesByRoomAndWork(int $room, int $work)
    {
        return Price::getPrices(Room::getRoomNum($room)->getType(), $work);
    }
    public function getRoomForBuild(int $room)
    {
        return Room::getRoomNum($room);
    }
    protected static function getTableName()
    {
        return 'statistics';
    }
}