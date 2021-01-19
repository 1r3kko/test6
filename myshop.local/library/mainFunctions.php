<?php 
function loadPage($smarty,$controllerName, $actionName = 'index'){
	include_once PathPrefix . $controllerName . PathPostfix;

	$function = $actionName . 'Action';
	$function($smarty);
}

function loadTemplate($smarty, $templateName)
{
	$smarty->display(TemplatePrefix . $templateName . TemplatePostfix);
}

function d($value = null, $die = 1){
	echo 'Debug: <br /><pre>';
	print_r($value);
	echo '</pre>';

	if($die) die;
}
//Преобразование результата работы функции выборки в ас.массив
//$rs набор строк - результат работы Select
function createSmartyRsArray($rs)
{
	if(!$rs) return false;

	$smartyRs=array();
	while($row=$rs->fetch_assoc()){
		$smartyRs[]=$row;
	}
	return $smartyRs;
}
//Редирект
function redirect($url){
	if(!$url) $url='/';
	header("Location:$url");
	exit;
}