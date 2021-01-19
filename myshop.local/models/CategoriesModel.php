<?php 

// модель для таблицы категории

//дочерние категории для категории $catId
function getChildrenForCat($catId){
	global $db;
	$sql = "Select * From categories Where parent_id='$catId'";
	$rs = $db->query($sql);

	return createSmartyRsArray($rs);
}

//получение главных категорий с привязками дочерних
function getAllMainCatsWithChildren(){
	global $sql, $db, $rs;
	$sql="Select * From categories Where parent_id=0";
	$rs=$db->query($sql);

	$smartyRs = array();
	while($row=$rs->fetch_assoc()){
		$rsChildren = getChildrenForCat($row['id']);

		if($rsChildren){
			$row['children']=$rsChildren;
		}
		$smartyRs[] = $row;
	}
	return $smartyRs;
}
//Получить данные категории по id
function getCatById($catId)
{
	global $db, $sql, $rs;
	$catId = intval($catId);
	$sql = "Select * From categories Where id = ($catId)";
	$rs = $db->query($sql);

	return $rs->fetch_assoc();
}
//получить все главные категории(не дочерние)
function getAllMainCategories()
{
	global $db, $sql, $rs;
	$sql = "Select * From categories Where parent_id = 0";
	$rs = $db->query($sql);

	return createSmartyRsArray($rs);
}
//добавление новой категории
function insertCat($catName, $catParentId=0){
	global $db;
	//готовим запрос
	$sql="INSERT INTO categories (`parent_id`,`name`) 
	VAlUES ('{$catParentId}','{$catName}')";
	//выполняем запрос
	mysqli_query($db,$sql);
	//получаем id добавленной записи
	$id=mysqli_insert_id($db);
	return $id;
}
function getAllCategories(){
	global $db;
	$sql = "Select * From categories ORDER BY parent_id ASC";
	$rs = $db->query($sql);

	return createSmartyRsArray($rs);
}
//обновление категории
function updateCategoryData($itemId, $parentId=-1,$newName=''){
	global $db;
	$set=array();
	if($newName){
		$set[]="`name`='{$newName}'";
	}
	if($parentId>-1){
		$set[]="`parent_id`='{$parentId}'";
	}
	$setStr=implode($set,", ");
	$sql = "UPDATE categories SET {$setStr} Where id = '{$itemId}'";
	$rs = $db->query($sql);
	return $rs;
}