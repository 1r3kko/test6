<?php 

session_start(); //стартуем сессию

//если в сессии нет массива корзины то создаем его
if(!isset($_SESSION['cart'])){
	$_SESSION['cart']=array();
}

include_once '../config/config.php';  //Инициализация настроек
include_once '../config/db.php'; //Подключение к БД
include_once '../library/mainFunctions.php'; //Основные функции

//контроллер
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']):'Index';

//функция
$actionName = isset($_GET['action']) ? $_GET['action']:'index';

//если в сесси есть данные об авториз.пользователе, то передаём их в шаблон
if (isset($_SESSION['user'])){
	$smarty->assign('arUser',$_SESSION['user']);
}
$smarty->assign('cartCntItems',count($_SESSION['cart']));
loadPage($smarty, $controllerName, $actionName);