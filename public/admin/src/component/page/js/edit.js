
//实例编辑器
var um = UM.getEditor('detail');


//如果列表页没传递id过来则跳回去
if(typeof(id) == 'undefined'){
    window.location.href=admin_url+'/#/'+'page'
}
else{
    ajaxCommon('page/'+id+'/edit','','get',ajaxReturn);
}

function ajaxReturn(data){
    $("input[name='page_name']").val(data.data.page_name);
    
    if(data.data.page_detail !=null)
        um.setContent(data.data.page_detail);
}

window.onsubmit=function(){
    var detail = um.getContent();
    var post_data = $("#data").serialize();
    post_data +='&detail='+detail;

    ajaxCommon('page/'+id,post_data,'put',updateReturn);
    return false;
}

function updateReturn(){
    window.location.href=admin_url+'/#/'+'page'
}




