ajaxCommon('indexUser','','get',ajaxReturn);

function ajaxReturn(data){
    var html = '';
    data.list.forEach(function(item, index){
        html += '<tr>';
        html += '<td>'+item['id']+'</td>';
        html += '<td>'+item['user_name']+'</td>';
        html += '<td>'+item['created_at']+'</td>';
        if(item['apply_status'] == 0 )
            html += '<td>未审核</td>';

        else if(item['apply_status'] == 1 )
            html += '<td>审核中</td>';

        else if(item['apply_status'] == 2 )
            html += '<td>审核通过</td>';

        html += '</td></tr>';
    });

    $("#tbody").html(html);
}