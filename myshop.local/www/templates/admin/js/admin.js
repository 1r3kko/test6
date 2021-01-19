//получение данных с формы
function getData(obj_form){
	var hData = {};
	$('input,textarea,select',obj_form).each(function(){
		if(this.name && this.name!=''){
			hData[this.name]=this.value;
			console.log('hData['+this.name+']='+hData[this.name]);
		}
	});
	return hData;
};
function newCategory(){
	var postData=getData('#blockNewCategory');

	$.ajax({
		type:'POST',
		async:true,
		url:"/www/admin/addnewcat/",
		data: postData,
		dataType:'json',
		success:function(data){
			if(data['success']){
				alert(data['message'])
				$('#newCategoryName').val('');
			} else{
				alert(data['message']);
			}
		} 
	});
}
//обновление данных категории
function updateCat(itemId){
var parentId=$('#parentId_'+itemId).val();
var newName=$('#itemName_'+itemId).val();
var postData={itemId: itemId, parentId: parentId,newName: newName};
	$.ajax({
		type:'POST',
		async:true,
		url:"/www/admin/updatecategory/",
		data: postData,
		dataType:'json',
		success:function(data){
				alert(data['message']);
			}
	});
}
//Добавление нового продукта
function addProduct(){
	var itemName=$('#newItemName').val();
	var itemPrice=$('#newItemPrice').val();
	var itemCatId=$('#newItemCatId').val();
	var itemDesc=$('#newItemDesc').val();

	var postData={itemName: itemName, itemPrice: itemPrice,itemCatId: itemCatId, itemDesc:itemDesc};

	$.ajax({
		type:'POST',
		async:true,
		url:"/www/admin/addproduct/",
		data: postData,
		dataType:'json',
		success:function(data){
				alert(data['message'])
			if(data['success']){
				$('#newItemName').val('');
				$('#newItemPrice').val('');
				$('#newItemCatId').val('');
				$('#newItemDesc').val('');
			}
		} 
	});
}
//Изменение данных продукта
function updateProduct(itemId){
	var itemName=$('#itemName_'+itemId).val();
	var itemPrice=$('#itemPrice_'+itemId).val();
	var itemCatId=$('#itemCatId_'+itemId).val();
	var itemDesc=$('#itemDesc_'+itemId).val();
	var itemStatus=$('#itemStatus_'+itemId).prop('checked');
	if(!itemStatus){
		itemStatus=1;
	}else{
		itemStatus=0;
	}

	var postData={itemId:itemId, itemName: itemName, itemPrice: itemPrice,itemCatId: itemCatId, itemDesc:itemDesc, itemStatus:itemStatus};

	$.ajax({
		type:'POST',
		async:true,
		url:"/www/admin/updateproduct/",
		data: postData,
		dataType:'json',
		success:function(data){
				alert(data['message'])
		} 
	});
}
function showProducts(id){
	var objName="#purchaseForOrderId_"+id;
	if($(objName).css('display')!='table-row'){
		$(objName).show();
	}else{
		$(objName).hide();
	}
}
//Изменение статуса заказа
function updateOrderStatus(itemId){
	var status = $('#itemStatus_' + itemId).prop('checked');
	if(!status){
		status=0;
	}else{
		status=1;
	}
	var postData={itemId:itemId, status:status}
	$.ajax({
		type:'POST',
		async:true,
		url:"/www/admin/setorderstatus/",
		data: postData,
		dataType:'json',
		success:function(data){
			if(!data['success']){
				alert(data['message'])
			}
		} 
	});
}
//Изменение информации об оплате заказа
function updateDatePayment(itemId){
	var datePayment = $('#datePayment_' + itemId).val();
	var postData={itemId:itemId, datePayment:datePayment}
	$.ajax({
		type:'POST',
		async:true,
		url:"/www/admin/setorderdatepayment/",
		data: postData,
		dataType:'json',
		success:function(data){
			if(!data['success']){
				alert(data['message'])
			}
		} 
	});
}