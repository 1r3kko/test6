<?php 
//Модель для таблицы продукции(purchase)
//Внесение в БД данных продуктов с привязкой к заказу
//param $orderId ID заказа
//param array $cart массив корзины
//return boolean TRUE в случае успешного добавления в БД
function setPurchaseForOrder($orderId,$cart)
{
	global $db;
	$sql="INSERT INTO purchase(order_id,
	product_id,price,amount) Values ";
	$values=array();
	//Формируем массив строк для запроса для 
	//каждого товара
	foreach($cart as $item){
		$values[]="('{$orderId}','{$item['id']}','{$item['price']}','{$item['cnt']}')";
	}
	$sql.=implode($values,', ');
	$rs=$db->query($sql);
	return $rs;
}
function getPurchaseForOrder($orderId){
	global $db;
	$sql="SELECT `pe`.*,`ps`.`name`
	FROM purchase as `pe` JOIN products as `ps` ON `pe`.product_id=`ps`.id WHERE `pe`.order_id={$orderId}";
	$rs=$db->query($sql);
	return createSmartyRsArray($rs);
}