<?php
//Контроллер бэкенда сайта (/admin)
//подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';

$smarty->setTemplateDir(TemplateAdminPrefix);
$smarty->assign('TemplateWebPath', TemplateAdminWebPath);

function indexAction($smarty){
	$rsCategories = getAllMainCategories();
	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('pageTitle', 'Управление сайтом');
	loadTemplate($smarty,'adminHeader');
	loadTemplate($smarty,'adminLeftcolumn');
	loadTemplate($smarty,'admin');
	loadTemplate($smarty,'adminFooter');

}

function addnewcatAction(){
	$catName=$_POST['newCategoryName'];
	$catParentId=$_POST['generalCatId'];

	$res=insertCat($catName,$catParentId);
	if($res){
		$resData['success']=1;
		$resData['message']='Категория добавлена';
	}else{
		$resData['success']=0;
		$resData['message']='Ошибка добавления категории';
	}
	echo json_encode($resData);
	return;
}
//страница управления категориями
function categoryAction($smarty){
	$rsCategories=getAllCategories();
	$rsMainCategories=getAllMainCategories();
$smarty->assign('rsCategories', $rsCategories);
$smarty->assign('rsMainCategories', $rsMainCategories);
$smarty->assign('pageTitle', 'Управление сайтом');

loadTemplate($smarty,'adminHeader');
loadTemplate($smarty,'adminLeftcolumn');
loadTemplate($smarty,'adminCategory');
loadTemplate($smarty,'adminFooter');
}
//страница управления категориями
function updatecategoryAction(){
	$itemId=$_POST['itemId'];
	$parentId=$_POST['parentId'];
	$newName=$_POST['newName'];
	$res=updateCategoryData($itemId,$parentId,$newName);
	if($res){
		$resData['success']=1;
		$resData['message']='Категория обновлена';
	}else{
		$resData['success']=0;
		$resData['message']='Ошибка изменения данных категории';
	}
	echo json_encode($resData);
	return;
}
//страница управления товарами
function productsAction($smarty){
	$rsCategories=getAllCategories();
	$rsProducts=getProducts();
$smarty->assign('rsCategories', $rsCategories);
$smarty->assign('rsProducts', $rsProducts);
$smarty->assign('pageTitle', 'Управление сайтом');

loadTemplate($smarty,'adminHeader');
loadTemplate($smarty,'adminLeftcolumn');
loadTemplate($smarty,'adminProducts');
loadTemplate($smarty,'adminFooter');
}
function addproductAction(){
	$itemName=$_POST['itemName'];
	$itemPrice=$_POST['itemPrice'];
	$itemDesc=$_POST['itemDesc'];
	$itemCat=$_POST['itemCatId'];

	$res=insertProduct($itemName,$itemPrice,$itemDesc,$itemCat);
	if($res){
		$resData['success']=1;
		$resData['message']='Изменения успешно сохранены';
	}else{
		$resData['success']=0;
		$resData['message']='Ошибка изменения данных';
	}
	echo json_encode($resData);
	return;
}
function updateproductAction(){
	$itemId=$_POST['itemId'];
	$itemName=$_POST['itemName'];
	$itemPrice=$_POST['itemPrice'];
	$itemStatus=$_POST['itemStatus'];
	$itemDesc=$_POST['itemDesc'];
	$itemCat=$_POST['itemCatId'];

	$res=updateProduct($itemId,$itemName,$itemPrice, $itemStatus, $itemDesc, $itemCat);
	if($res){
		$resData['success']=1;
		$resData['message']='Изменения успешно внесены';
	}else{
		$resData['success']=0;
		$resData['message']='Ошибка изменения данных';
	}
	echo json_encode($resData);
	return;
}
function uploadAction(){
	$maxSize=2*1024*1024;
	$itemId=$_POST['itemId'];
	//получаем расширение загружаемого файла
	$ext=pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);
	//создаем имя файла
	$newFileName=$itemId. '.' . $ext;
	if($_FILES["filename"]["size"]>$maxSize){
		echo ("Размер файла превышает два мегабайта");
		return;
	}
	//Загружен ли файл
	if(is_uploaded_file($_FILES['filename']['tmp_name'])){
		//Если файл загружен то перемещаем его из временной директории в конечную
		$res=move_uploaded_file($_FILES['filename']['tmp_name'],$_SERVER['DOCUMENT_ROOT'] . '/www/images/products/' . $newFileName);
		if($res){
			$res=updateProductImage($itemId,$newFileName);
			if($res){
				redirect('/www/admin/products/');
			}
		}
	}else{
		echo("Ошибка загрузки файла");
	}
}
function ordersAction($smarty){
	$rsOrders=getOrders();
	$smarty->assign('rsOrders', $rsOrders);
	$smarty->assign('pageTitle', 'Заказы');
	loadTemplate($smarty,'adminHeader');
	loadTemplate($smarty,'adminLeftcolumn');
	loadTemplate($smarty,'adminOrders');
	loadTemplate($smarty,'adminFooter');
}
function setorderstatusAction(){
	$itemId=$_POST['itemId'];
	$status=$_POST['status'];

	$res=updateOrderStatus($itemId, $status);
	if($res){
		$resData['success']=1;
	}else{
		$resData['success']=0;
		$resData['message']='Ошибка установки статуса';
	}
	echo json_encode($resData);
	return;
}
function setorderdatepaymentAction(){
	$itemId=$_POST['itemId'];
	$datePayment=$_POST['datePayment'];

	$res=updateOrderDatePayment($itemId, $datePayment);
	if($res){
		$resData['success']=1;
	}else{
		$resData['success']=0;
		$resData['message']='Ошибка установки даты';
	}
	echo json_encode($resData);
	return;
}