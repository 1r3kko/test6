<?php

namespace MyProject\Controllers;

use MyProject\Models\Builds\Build;
use MyProject\Models\Prices\Price;
use MyProject\Models\Rooms\Room;
use MyProject\Models\Statistics\Statistic;
use MyProject\Models\Users\User;
use MyProject\Models\Works\Work;
use MyProject\View\View;

class MainController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    public function main()
    {
        $builds = Build::findAll();
        $prices = Price::findAll();
        $rooms = Room::findAll();
        $statistics = Statistic::findAll();
        $works = Work::findAll();
        $staffId = Statistic::getStaffById(User::getUserByName('Чистых Елена')->getId(), '2020-09-01', '2020-09-30');
        $this->view->renderHtml('main/main.php', ['builds' => $builds, 'prices' => $prices, 'rooms' => $rooms,
            'statistics' => $statistics,'works' => $works, 'staffId' => $staffId]);
    }
    public function day(string $date)
    {
        $builds = Build::findAll();
        $prices = Price::findAll();
        $rooms = Room::findAll();
        $works = Work::findAll();
        $staffId = Statistic::getStaffByIdForOneDay(User::getUserByName('Чистых Елена')->getId(), $date);
        $this->view->renderHtml('main/hello.php', ['builds' => $builds, 'prices' => $prices, 'rooms' => $rooms,
            'works' => $works, 'staffId' => $staffId
        ]);
    }
}