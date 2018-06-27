$('.btn-toggle > a').click(function(){
    $(this).addClass('active');
    $(this).addClass('btn-primary');
    $(this).siblings('a').removeClass('active');
    $(this).siblings('a').removeClass('btn-primary');
    $(this).siblings('a').addClass('btn-default');
    $("#order_status").val($(this).attr('data'));
});

//如果列表页没传递id过来则跳回去
if(typeof(id) == 'undefined'){
    window.location.href=admin_url+'/#/'+'order'
}
else{
    ajaxCommon('order/'+id+'/edit','','get',ajaxReturn);
}

function ajaxReturn(data){
    $("input[name='order_id']").val(data.detail.order_id);
    $("input[name='address']").val(data.detail.address);
    $("input[name='created_at']").val(data.detail.created_at);

    var html = '';

    if(data.detail.detail !=null){
        data.detail.detail.forEach(function(item, index){
            html += '<div>'+item['item_name']+' 每月租金：'+item['month_rent_price']+' 租赁月数：'+item['rent_month']+' 租赁台数：'+item['rent_num']+'</div>';
        })
    }
    $("#detail").html(html);


    if(data.detail.order_status == 1){
        $('.btn-toggle > a').eq(0).trigger('click');
    }
    else if (data.detail.order_status == 2){
        $('.btn-toggle > a').eq(1).trigger('click');
    }
    else if (data.detail.order_status == 3){
        $('.btn-toggle > a').eq(2).trigger('click');
    }

}


window.onsubmit=function(){
    var post_data = {
        'order_status':$("#order_status").val()
    };
    ajaxCommon('order/'+id,post_data,'put',updateReturn);
    return false;
}

function updateReturn(){
    window.location.href=admin_url+'/#/'+'order'
}


$("#showDoc").click(function(){
    window.open('/userOrderDoc?id='+id,'_blank');
})

