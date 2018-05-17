ajaxCommon('indexUser','','get',ajaxReturn);

function ajaxReturn(data){
    var html = '';
    data.list.forEach(function(item, index){
        html += '<tr>';
        html += '<td>'+item['id']+'</td>';
        html += '<td>'+item['user_name']+'</td>';
        html += '<td>'+item['created_at']+'</td>';
        html += '</td></tr>';
    });

    $("#tbody").html(html);
}