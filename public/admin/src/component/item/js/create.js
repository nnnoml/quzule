window.onsubmit=function(){
    var detail = um_d.getContent();
    var parame = um_p.getContent();
    var post_data = $("#data").serialize();
    post_data +='&detail='+detail;
    post_data +='&parame='+parame;

    ajaxCommon('item',post_data,'post',ajaxReturn);
    return false;
}

function ajaxReturn(data){
    window.location.href=admin_url+'/#/'+'item'
}

//开关
$(function(){
    $('.btn-toggle > a').click(function(){
        if($(this).hasClass('active')) return;
        else{
            $(this).addClass('active');
            $(this).addClass('btn-primary');
            $(this).siblings('a').removeClass('active');
            $(this).siblings('a').removeClass('btn-primary');
            $(this).siblings('a').addClass('btn-default');
            $("#is_show").val($(this).attr('data'));
        }
    });
});

  var um_d = UM.getEditor('item_detail');
  var um_p = UM.getEditor('item_parame');