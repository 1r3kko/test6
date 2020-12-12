<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
<table class="layout">
    <tr><td>Дата</td><td>Начало рабочего дня</td><td>Конец рабочего дня</td>
        <td>Количество генеральных уборок</td><td>Количество текущих уборок</td><td>Количество заездов</td>
        <td>Сумма оплаты за день</td></tr>
<?php $numz=0;$numg=0; $numt=0; $price1=0;$price2=0;$price3=0; $price=0; $date1='2020-09-02';
foreach ($staffId as $staff):
    $date2 = date_create($staff->getCreated());
    $data = date_format($date2, 'Y-m-d');
    if (($data!=$date1)||($staff==end($staffId))): ?>
    <tr><td><a href="/day/<?= $date1?>"><?= $date1?></a></td>
    <td><?= $nacalo ?></td>
    <td><?= $konec ?></td>
    <td><?= $numg ?></td>
    <td><?= $numt ?></td>
    <td><?= $numz ?></td>
    <td><?= ($price1+$price2+$price3); ?></td></tr>
    <? $numz=0;$numg=0; $numt=0; $price=$price+$price1+$price2+$price3; $price1=0;$price2=0;$price3=0;
    $date1= $data;endif; ?>

    <?php if ($staff->getWork()==0): ?>
        <? $date = date_create($staff->getCreated()); ?>
        <? $data= date_format($date, 'Y-m-d') ?>
        <? $nacalo= $staff->getStart() ?>
        <? $konec=$staff->getEnd() ?>
    <?php elseif($staff->getWork()==1): ?>
        <?  $numz++; ?>
        <? $price1=$price1+ $staff->getPricesByRoomAndWork($staff->getRoom(),$staff->getWork())->getPrice(); ?>
    <?php elseif($staff->getWork()==2):?>
        <? $numg++; ?>
        <?  $price2=$price2+$staff->getPricesByRoomAndWork($staff->getRoom(), $staff->getWork())->getPrice(); ?>
    <?php elseif($staff->getWork()==3): ?>
        <? $numt++; ?>
        <?  $price3=$price3+$staff->getPricesByRoomAndWork($staff->getRoom(), $staff->getWork())->getPrice();
                    if($staff->getBed()==1) $price3=$price3+30;
                    if($staff->getTowels()==1) $price3=$price3+10;?>
    <?php endif; ?>
<?php endforeach; ?>
</table>
<h1 style="text-align: center"><?= "Итог за сентябрь:" . $price; ?></h1>
</body>
</html>