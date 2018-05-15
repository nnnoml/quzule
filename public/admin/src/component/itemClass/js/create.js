window.onsubmit=function(){
    var post_data = $("#data").serialize();
    ajaxCommon('itemClass',post_data,'post',ajaxReturn);
    return false;
}

function ajaxReturn(data){
    window.location.href=admin_url+'/#/'+'itemClass'
}


//如果列表页没传递id过来则按0处理
if(typeof(pid) == 'undefined'){
    $("input[name='pid']").val(0);
}
else{
    $("input[name='pid']").val(pid);
}