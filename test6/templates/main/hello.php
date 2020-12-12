<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
<table class="layout">
    <tr><td>Номер(корпус)</td><td>Категория номера</td><td>Тип уборки</td>
        <td>Начало уборки</td><td>Конец уборки</td><td>Сумма за уборку</td></tr>
<?php $numz=0;$numg=0; $numt=0; $price1=0;$price2=0;$price3=0; $price=0; $date='2020-09-01' ?>
<?php foreach ($staffId as $staff): ?>
    <?php if($staff->getWork()!=0): ?>
    <tr><td><?= $staff->getRoom(),'(' . $staff->getRoomForBuild($staff->getRoom())->getBuild() . ')' ?></td>
        <td><?= $staff->getRoomForBuild($staff->getRoom())->getType()  ?></td>
        <td><?= $staff->getWork() ?></td>
        <td><?= $staff->getStart() ?></td>
        <td><?= $staff->getEnd() ?></td>
    <?php endif; ?>
    <?php if($staff->getWork()==1): ?>
            <?php $price1=$staff->getPricesByRoomAndWork($staff->getRoom(),$staff->getWork())->getPrice();?>
            <td><?= $price1; ?></td>
            <? $price=$price+$price1; $price1=0;?>
    <?php elseif($staff->getWork()==2):?>
                <?php $price2=$staff->getPricesByRoomAndWork($staff->getRoom(),$staff->getWork())->getPrice();?>
                <td><?= $price2; ?></td>
                <? $price=$price+$price2; $price2=0;?>
    <?php elseif($staff->getWork()==3): ?>
                    <?php $price3=$staff->getPricesByRoomAndWork($staff->getRoom(),$staff->getWork())->getPrice();
                    if($staff->getBed()==1) $price3=$price3+30;
                    if($staff->getTowels()==1) $price3=$price3+10;?>
                    <td><?= $price3; ?></td>
                    <? $price=$price+$price3; $price3=0;?></tr>
<?php endif; ?>
<?php endforeach; ?>
</table>
<h1 style="text-align: center"><?= "Итог за день:" . $price ?></h1>
</body>
</html>
