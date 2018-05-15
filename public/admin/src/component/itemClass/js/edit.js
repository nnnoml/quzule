//如果列表页没传递id过来则跳回去
if(typeof(pid) == 'undefined'){
    window.location.href=admin_url+'/#/'+'itemClass'
}
else{
    $("input[name='pid']").val(pid);
    ajaxCommon('itemClass/'+pid+'/edit','','get',ajaxReturn);
}

function ajaxReturn(data){
    $("input[name='class_name']").val(data.data.class_name);
}

window.onsubmit=function(){
    var post_data = $("#data").serialize();

    ajaxCommon('itemClass/'+pid,post_data,'put',submitReturn);
    return false;
}

function submitReturn(){
    window.location.href=admin_url+'/#/'+'itemClass'
}




