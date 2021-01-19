<?php 
//Контроллер функций пользователя
//подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/UsersModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';
//AJAX регистрация пользователя
//Инициализация сессионной переменной ($_SESSION['user'])
//return json массив данных нового пользователя
function registerAction(){
	$email=isset($_REQUEST['email']) ? $_REQUEST['email']:null;
	$email=trim($email);

	$pwd1=isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1']:null;
	$pwd2=isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2']:null;

	$phone=isset($_REQUEST['phone']) ? $_REQUEST['phone']:null;
	$adress=isset($_REQUEST['adress']) ? $_REQUEST['adress']:null;
	$name=isset($_REQUEST['name']) ? $_REQUEST['name']:null;
	$name=trim($name);

	$resData=null;
	$resData=checkRegisterParams($email,$pwd1,$pwd2);

	if(!$resData && checkUserEmail($email)){
		$resData['success']=false;
		$resData['message']="Пользователь с таким email('{email}') уже зарегистрирован";
	}
	if(!$resData){
		$pwdMD5=md5($pwd1);
		$userData=registerNewUser($email,$pwdMD5,$name,$phone,$adress);
		if($userData['success']){
			$resData['message']='Пользователь успешно зарегистрирован';
			$resData['success']=1;

			$userData=$userData[0];
			$resData['userName']=$userData['name'] ? $userData['name']:$userData['email'];
			$resData['userEmail']=$email;

			$_SESSION['user']=$userData;
			$_SESSION['user']['displayName']=$userData['name'] ? $userData['name'] : $userData['email'];
		} else{
			$resData['success']=0;
			$resData['message']='Ошибка регистрации';
		}
	}
	echo json_encode($resData);
}
//Разлогинивание пользователя
function logoutAction(){
	if(isset($_SESSION['user'])){
		unset($_SESSION['user']);
		unset($_SESSION['cart']);
	}
	redirect('/www/');
}
//AJAX авторизация пользователя	
//json массив данных пользователя
function loginAction(){
	$email=isset($_REQUEST['email']) ? $_REQUEST['email']:null;
	$email=trim($email);

	$pwd=isset($_REQUEST['pwd']) ? $_REQUEST['pwd']:null;
	$pwd=trim($pwd);

	$userData=loginUser($email,$pwd);

	if($userData['success']){
			$userData=$userData[0];
			$_SESSION['user']=$userData;
			$_SESSION['user']['displayName']=$userData['name'] ? $userData['name'] : $userData['email'];
			$resData=$_SESSION['user'];
			$resData['success']=1;
		} else{
			$resData['success']=0;
			$resData['message']='Неверный логин или пароль';
		}
	echo json_encode($resData);
}
//формирование главной страницы пользователя
function indexAction($smarty){
	//если польз. не залогинен, то редирект на главную страницу
	if (!isset($_SESSION['user'])){
		redirect('/www/');
	}
$rsCategories = getAllMainCatsWithChildren();

//получаем список заказов пользователя
$rsUserOrders=getCurUserOrders();
$smarty->assign('pageTitle', 'Страница пользователя');
$smarty->assign('rsCategories', $rsCategories);
$smarty->assign('rsUserOrders',$rsUserOrders);

loadTemplate($smarty,'header');
loadTemplate($smarty,'user');
loadTemplate($smarty,'footer');
}
//Обновление данных пользователя
function updateAction(){
	//если пользователь не залогинен, то выходим
	if(!isset($_SESSION['user'])){
		redirect('/www/');
	}
	$resData=array();
	$phone=isset($_REQUEST['phone']) ? $_REQUEST['phone']:null;
	$adress=isset($_REQUEST['adress']) ? $_REQUEST['adress']:null;
	$name=isset($_REQUEST['name']) ? $_REQUEST['name']:null;
	$pwd1=isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1']:null;
	$pwd2=isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2']:null;
	$curPwd=isset($_REQUEST['curPwd']) ? $_REQUEST['curPwd']:null;
	//проверка правильности пароля(введенный и под которым залогинились)
	$curPwdMD5=md5($curPwd);
	if(!$curPwd || ($_SESSION['user']['pwd']!=$curPwdMD5)){
		$resData['success']=0;
		$resData['message']='Текущий пароль неверный';
		echo json_encode($resData);
		return false;
	}
	$res=updateUserData($name,$phone,$adress,$pwd1,$pwd2,$curPwdMD5);
	if($res){
		$resData['success']=1;
		$resData['message']='Данные сохранены';
		$resData['userName']=$name;

		$_SESSION['user']['name']=$name;
		$_SESSION['user']['phone']=$phone;
		$_SESSION['user']['adress']=$adress;

		$newPwd=$_SESSION['user']['pwd'];
	    if($pwd1 && ($pwd1==$pwd2)){
		$newPwd=md5(trim($pwd1));
	    }

		$_SESSION['user']['pwd']=$newPwd;
		$_SESSION['user']['displayName']=$name ? $name : $_SESSION['user']['email'];
	}else{
		$resData['success']=0;
		$resData['message']='Ошибка сохранения данных';
	}
	echo json_encode($resData);
}