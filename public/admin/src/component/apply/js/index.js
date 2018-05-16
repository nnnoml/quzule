ajaxCommon('apply','','get',ajaxReturn);

function ajaxReturn(data){
    var html = '';
    data.list.forEach(function(item, index){
        html += '<tr>';
        html += '<td>'+item['id']+'</td>';
        html += '<td>'+item['user_name']+'</td>';
        html += '<td>'+item['check_status_cn']+'</td>';
        html += '<td>'+item['created_at']+'</td>';
        html += '<td><button class="btn btn-default btn-sm t_detail" data="'+item['id']+'" type="button">查看</button></td>';
        html += '</tr>';        
    });

    $("#tbody").html(html);
}


$(".t_detail").click(function(){
    id = $(this).attr('data');
    window.location.href=admin_url+'/#/'+'apply/detail';
})


function delReturn(){
    window.location.reload();
}