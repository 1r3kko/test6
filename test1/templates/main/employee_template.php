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
    <tr><td>Фамилия сотрудника</td><td>Имя сотрудника</td><td>Отчество сотрудника</td><td>Дата рождения</td><td>Пол</td><td>Действие</td></tr>
    <?php
    foreach ($employeeId as $employee): ?>
        <td><input type="text" value="<?= $employee->getSurname();?>"></td>
        <td><input type="text" value="<?= $employee->getName();?>"></td>
        <td><input type="text" value="<?= $employee->getPatronymic();?>"></td>
        <td><input type="text" value="<?= $employee->getBirthdate(); ?>"></td>
        <td><input type="text" value="<? if($employee->getGender()==0) echo 'м';
            elseif($employee->getGender()==1) echo 'ж';?>"></td>
        <td><a href="#" onClick="updateEmployee(<?=$employee->getId();?>); return false;" alt="Сохранить">Сохранить</a></td></tr>
    <?php endforeach;?>
</table>
</body>
</html>