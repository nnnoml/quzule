window.onsubmit=function(){
    var detail = um.getContent();
    var post_data = $("#data").serialize();
    post_data +='&detail='+detail;

    ajaxCommon('page',post_data,'post',ajaxReturn);
    return false;
}

function ajaxReturn(data){
    window.location.href='/#/page'
}

var um = UM.getEditor('detail');