<?php 

//Модель для таблицы products
//Получаем последние добавленные товары

function getLastProducts($limit=null)
{
	global $db;
	$sql = "Select * FROM products WHERE status=1 ORDER BY id DESC ";

	if($limit){
		$sql .=" LIMIT $limit";
	}
	$rs=$db->query($sql);

	return createSmartyRsArray($rs);
}
//получить продукты для категории $itemId
function getProductsByCat($itemId){
	global $db;
	$itemId=intval($itemId);
	$sql="Select * From products Where status=1 AND category_id=($itemId)";
	$rs=$db->query($sql);

	return createSmartyRsArray($rs);
}
//получить данные продукта по ID, параметр - ID продукта, 
//return array - массив данных продукта
function getProductById($itemId){
	global $db;
	$itemId=intval($itemId);
	$sql = "SELECT * FROM products WHERE id =($itemId)";
	$rs = $db->query($sql);
	return mysqli_fetch_assoc($rs);
}
//получить список продуктов из массива идентификаторов
function getProductsFromArray($itemsIds){
	global $db;
	$strIds=implode($itemsIds,', ');
	$sql = "SELECT * FROM products WHERE id in ({$strIds})";
	$rs = $db->query($sql);
	return createSmartyRsArray($rs);
}
function getProducts(){
	global $db;
	$sql = "SELECT * FROM `products` ORDER BY category_id";
	$rs = $db->query($sql);
	return createSmartyRsArray($rs);
}
//добавление нового товара
function insertProduct($itemName, $itemPrice, $itemDesc, $itemCat){
	global $db;
	//готовим запрос
	$sql="INSERT INTO products SET `name`='{$itemName}',
	`price`='{$itemPrice}', `description`='{$itemDesc}',
	`category_id`='{$itemCat}'";
	//выполняем запрос
	$rs=$db->query($sql);
	return $rs;
}
function updateProduct($itemId,$itemName, $itemPrice, $itemStatus, $itemDesc, $itemCat, $newFileName=null){
	global $db;
	$set=array();
	if($itemName){
		$set[]="`name`='{$itemName}'";
	}
	if($itemPrice){
		$set[]="`price`='{$itemPrice}'";
	}
	if($itemStatus==0 || $itemStatus==1){
		$set[]="`status`='{$itemStatus}'";
	}
	if($itemDesc){
		$set[]="`description`='{$itemDesc}'";
	}
	if($itemCat){
		$set[]="`category_id`='{$itemCat}'";
	}
	if($newFileName){
		$set[]="`image`='{$newFileName}'";
	}
	//готовим запрос
	$setStr=implode($set,", ");
	$sql="UPDATE products SET {$setStr} WHERE id='{$itemId}'";
	//выполняем запрос
	$rs=$db->query($sql);
	return $rs;
}
function updateProductImage($itemId,$newFileName){
	$rs=updateProduct($itemId,null,null,2,null,null,$newFileName);
	return $rs;
}