function hideProduct(itemId){
    console.log("js - hideProduct("+itemId+")");
    $.ajax({
        type:'POST',
        async:false,
        url:"/hide/"+itemId+'/',
        dataType:'json',
        success:function(data){
            console.log(data);
            if(data['success']){
                $('#hideProduct_'+itemId).hide();
            }
            else{console.log("Ошибка при изменении видимости");}
        }
    })
}
function addQuantity(itemId){
    console.log("js - addQuantity("+itemId+")");
    $.ajax({
        type:'POST',
        async:false,
        url:"/addQuantity/"+itemId+'/',
        dataType:'json',
        success:function(data){
            console.log(data);
            if(data['success']){
                $('#quantity_'+itemId).html(data['quantity']);
                console.log("Количество продукта увеличено на 1");
            }
            else{console.log("Ошибка при изменении количества продукта");}
        }
    })
}
function deleteQuantity(itemId){
    console.log("js - deleteQuantity("+itemId+")");
    $.ajax({
        type:'POST',
        async:false,
        url:"/deleteQuantity/"+itemId+'/',
        dataType:'json',
        success:function(data){
            console.log(data);
            if(data['success']){
                $('#quantity_'+itemId).html(data['quantity']);
                console.log("Количество продукта уменьшено на 1");
            }
            else{console.log("Ошибка при изменении количества продукта");}
        }
    })
}