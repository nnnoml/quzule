ajaxCommon('order','','get',ajaxReturn);

function ajaxReturn(data){
    var html = '';
    data.list.forEach(function(item, index){
        html += '<tr>';
        html += '<td>'+item['id']+'</td>';
        html += '<td>'+item['order_id']+'</td>';
        html += '<td>'+item['user_name']+'</td>';
        html += '<td>'+item['address']+'</td>';
        html += '<td>'+item['created_at']+'</td>';

        if(item['order_status'] == 1)
            html += '<td>下单</td>';

        else if(item['order_status'] == 2)
            html += '<td>取消</td>';

        else if(item['order_status'] == 3)
            html += '<td>确认</td>';

        else 
            html += '<td>-</td>';

        html += '<td><button class="btn btn-default btn-sm t_edit" data="'+item['id']+'" type="button">查看</button> ';
        html += '</td></tr>';
    });

    $("#tbody").html(html);
}

$(".t_edit").click(function(){
    id = $(this).attr('data');
    window.location.href=admin_url+'/#/'+'order/edit';
})