<?php
//Модель для работы с таблицей users
//регистрация нового пользователя
function registerNewUser($email, $pwdMD5, $name, $phone, $adress){
	global $db;
	$email=htmlspecialchars(mysqli_real_escape_string($db,$email));
	$name=htmlspecialchars(mysqli_real_escape_string($db,$name));
	$phone=htmlspecialchars(mysqli_real_escape_string($db,$phone));
	$adress=htmlspecialchars(mysqli_real_escape_string($db,$adress));

	$sql="INSERT INTO users(`email`,`pwd`,`name`,`phone`,`adress`) VALUES ('{$email}','{$pwdMD5}','{$name}','{$phone}','{$adress}')";
	$rs=$db->query($sql);

	if($rs){
		$sql="SELECT * FROM users WHERE (`email`='{$email}' and `pwd`='{$pwdMD5}') LIMIT 1";
		$rs=$db->query($sql);
		$rs=createSmartyRsArray($rs);

		if(isset($rs[0])){
			$rs['success']=1;
		} else{
			$rs['success']=0;
		}
	}else{
		$rs['success']=0;
	}
	return $rs;
}
//Проверка параметров для регистрации пользователя
function checkRegisterParams($email,$pwd1,$pwd2){
	$res=null;

    if (!$email) {
        $res['success'] = false;
        $res['message'] = 'Введите email';
    }

    if (!$pwd1) {
        $res['success'] = false;
        $res['message'] = 'Введите пароль';
    }

    if (!$pwd2) {
        $res['success'] = false;
        $res['message'] = 'Введите повтор пароля';
    }

    if ($pwd1 != $pwd2) {
        $res['success'] = false;
        $res['message'] = 'Пароли не совпадают';
    }
    return $res;
}
//Проверка почты(есть ли email в БД)
function checkUserEmail($email){
	global $db;
	$email=mysqli_real_escape_string($db,$email);
	$sql="Select id From users Where email='{$email}'";
	$rs=$db->query($sql);
	$rs=createSmartyRsArray($rs);

	return $rs;
}
//Авторизация пользователя
function loginUser($email,$pwd){
	global $db;
	$email=htmlspecialchars(mysqli_real_escape_string($db,$email));
	$pwd=md5($pwd);
	$sql="Select * From users Where (`email`='{$email}' and `pwd`='{$pwd}') Limit 1";
	$rs=$db->query($sql);
	$rs=createSmartyRsArray($rs);
	if(isset($rs[0])){
			$rs['success']=1;
		} else{
			$rs['success']=0;
		}
	return $rs;
}
//Изменение данных пользователя
function updateUserData($name,$phone,$adress,$pwd1,$pwd2,$curPwd){
	global $db;
	$email=htmlspecialchars(mysqli_real_escape_string($db,$_SESSION['user']['email']));
	$name=htmlspecialchars(mysqli_real_escape_string($db,$name));
	$phone=htmlspecialchars(mysqli_real_escape_string($db,$phone));
	$adress=htmlspecialchars(mysqli_real_escape_string($db,$adress));
	$pwd1=trim($pwd1);
	$pwd2=trim($pwd2);

	$newPwd=null;
	if($pwd1 && ($pwd1==$pwd2)){
		$newPwd=md5($pwd1);
	}

	$sql="UPDATE users SET";

	if($newPwd){
		$sql.="`pwd`='{$newPwd}',";
	}
	$sql.=" `name`='{$name}',`phone`='{$phone}',`adress`='{$adress}' WHERE `email`='{$email}' AND `pwd`='{$curPwd}' LIMIT 1";
	$rs=$db->query($sql);
	return $rs;
}
//получить данные заказа текущего пользователя
//return array массив заказов с привязкой к продуктам
function getCurUserOrders(){
	$userId=isset($_SESSION['user']['id']) ? $_SESSION['user']['id']:0;
	$rs=getOrdersWithProductsByUser($userId);
	return $rs;
}