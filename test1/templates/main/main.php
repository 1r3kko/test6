<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/styles.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
</head>
<body>
<table class="layout">
    <tr><td>ФИО сотрудника</td><td>Дата рождения</td><td>Пол</td><td>Действие</td></tr>
<?php
foreach ($employees as $employee):?>
    <td><?= $employee->getSurname() . ' ' . $employee->getName() . ' ' . $employee->getPatronymic();?>
        <a href="/previousJob/<?=$employee->getId();?>" alt="Предыдущее место работы">(предыдущее место работы)</a></td>
    <td><?= $employee->getBirthdate(); ?></td>
    <td><? if($employee->getGender()==0) echo 'м';
            elseif($employee->getGender()==1) echo 'ж'?></td>
    <td> <a href="/editEmployee/<?=$employee->getId();?>" alt="Редактировать">Редактировать </a>
        <a href="#" onClick="deleteEmployee(<?=$employee->getId();?>); return false;" alt="Удалить">Удалить</a></td></tr>
<?php endforeach;?>
</table>
<p class="add"><a href="/addEmployee/" alt="Добавить">Добавить</a></p>
</body>
</html>