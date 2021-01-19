<?php 

//подключение к БД

$dblocation = "127.0.0.1";
$dbname = "myshop";
$dbuser = "root";
$dbpasswd = "root";

//соединение с БД
$db=mysqli_connect($dblocation,$dbuser,$dbpasswd, $dbname);

if(!$db){
	echo "Ошибка доступа к MySql";
	exit();
}

//кодировка для соединения
mysqli_set_charset($db,'utf8');

if(!mysqli_select_db($db,$dbname)){
	echo "Ошибка доступа к базе данных: ";
	exit();
}