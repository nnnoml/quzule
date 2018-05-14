
//实例编辑器
var um_d = UM.getEditor('item_detail');
var um_p = UM.getEditor('item_parame');

//开关
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

//如果列表页没传递id过来则跳回去
if(typeof(item_id) == 'undefined'){
    window.location.href=admin_url+'/#/'+'item'
}
else{
    ajaxCommon('item/'+item_id+'/edit','','get',ajaxReturn);
}

function ajaxReturn(data){
    $("input[name='item_name']").val(data.data.item_name);
    $("input[name='item_price']").val(data.data.item_price);
    $("input[name='item_rent_price']").val(data.data.item_rent_price);
    
    $("#is_show").val(data.data.is_show);

    if(data.data.is_show == 1)
        $('.btn-toggle > a').eq(0).trigger('click');
    else
        $('.btn-toggle > a').eq(1).trigger('click');
    
    if(data.data.item_detail !=null)
        um_d.setContent(data.data.item_detail);
    if(data.data.item_parame !=null)
        um_p.setContent(data.data.item_parame);

    if(data.imgs.length>0){
        var img_list = '';
        var input_img_list = '';
        data.imgs.forEach(function(item,index){
            img_list += '<img src="'+item+'" />';
            input_img_list+=item+',';
        })
        $("#warpper_back").show();
        $("#warpper_back").html(img_list);
        $("#item_img").val(input_img_list);
    }
}

window.onsubmit=function(){
    var detail = um_d.getContent();
    var parame = um_p.getContent();
    var post_data = $("#data").serialize();
    post_data +='&detail='+detail;
    post_data +='&parame='+parame;

    ajaxCommon('item/'+item_id,post_data,'put',updateReturn);
    return false;
}

function updateReturn(){
    window.location.href=admin_url+'/#/'+'item'
}




