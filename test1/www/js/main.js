function updateEmployee(employeeId){
    console.log("js - updateEmployee("+employeeId+")");
    var allArgs= document.getElementsByTagName(`input`);
    var args=[];
    args.push(employeeId);
    for (var i=0;i<allArgs.length;i++){
        args.push(allArgs[i].value);
    }
    $.ajax({
        type:'POST',
        async:true,
        url:"/updateEmployee/",
        data:{args: args},
        dataType:'json',
        success:function(data){
            console.log(data);
            if(data['success']){
                console.log("Количество продукта уменьшено на 1");
            }
            else{console.log("Ошибка при изменении количества продукта");}
        }
    })
}

function updateJob(jobId){
    console.log("js - updateJob("+jobId+")");
    var allArgs= document.getElementsByTagName(`input`);
    var args=[];
    args.push(jobId);
    for (var i=0;i<allArgs.length;i++){
        args.push(allArgs[i].value);
    }
    $.ajax({
        type:'POST',
        async:true,
        url:"/updateJob/",
        data:{args: args},
        dataType:'json',
        success:function(data){
            console.log(data);
            if(data['success']){
                console.log("Количество продукта уменьшено на 1");
            }
            else{console.log("Ошибка при изменении количества продукта");}
        }
    })
}
function insertEmployee(arg){
    console.log("js - insertEmployee()");
    var allArgs= document.getElementsByTagName(`input`);
    var args=[];
    args.push();
    for (var i=0;i<allArgs.length;i++){
        args.push(allArgs[i].value);
    }
    console.log(arg);
    console.log(args);
    $.ajax({
        type:'POST',
        async:true,
        url:"/insert/"+arg+'/',
        data:{args: args},
        dataType:'json',
        success:function(data){
            console.log(data);
            if(data['success']){
                console.log("Количество продукта уменьшено на 1");
            }
            else{console.log("Ошибка при изменении количества продукта");}
        }
    })
}
function deleteEmployee(arg){
    console.log("js - deleteEmployee()");
    console.log(arg);
    $.ajax({
        type:'POST',
        async:true,
        url:"/deleteEmployee/"+arg+'/',
        dataType:'json',
        success:function(data){
            console.log(data);
            if(data['success']){
                console.log("Количество продукта уменьшено на 1");
            }
            else{console.log("Ошибка при изменении количества продукта");}
        }
    })
}
function deleteJob(arg){
    console.log("js - deleteJob()");
    console.log(arg);
    $.ajax({
        type:'POST',
        async:true,
        url:"/deleteJob/"+arg+'/',
        dataType:'json',
        success:function(data){
            console.log(data);
            if(data['success']){
                console.log("Количество продукта уменьшено на 1");
            }
            else{console.log("Ошибка при изменении количества продукта");}
        }
    })
}