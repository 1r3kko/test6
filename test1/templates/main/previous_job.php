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
    <tr><td>Дата начала работы </td><td>Дата окончания работы </td><td>Наименование организации </td><td>Действие</td></tr>
    <?php
    foreach ($jobId as $job): ?>
        <td><input type="text" value="<?= $job->getJobStart();?>"></td>
        <td><input type="text" value="<?= $job->getJobEnd();?>"></td>
        <td><input type="text" value="<?= $job->getOrganizationName();?>"></td>
        <td><a href="#" onClick="updateJob(<?=$job->getId();?>); return false;" alt="Сохранить">Сохранить</a></td></tr>
    <?php endforeach;?>
</table>
</body>
</html>