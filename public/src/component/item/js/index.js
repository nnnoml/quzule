ajaxCommon('item','','get',ajaxReturn);

function ajaxReturn(data){
    var html = '';
    data.list.forEach(function(item, index){
        html += '<tr>';
        html += '<td>'+item['id']+'</td>';
        html += '<td>'+item['item_name']+'</td>';
        html += '<td>'+item['item_price']+'</td>';
        html += '<td>'+item['item_rent_price']+'</td>';
        html += '<td>'+item['is_show']+'</td>';
        html += '<td>'+item['updated_at']+'</td>';
        html += '<td><button class="btn btn-default btn-sm t_edit" data="'+item['id']+'" type="button">修改</button> ';
        html += '<button class="btn btn-default btn-sm t_delete" data="'+item['id']+'" type="button">删除</button></td>';
        html += '</tr>';        
    });

    $("#tbody").html(html);
}


$("#createItem").click(function (){
    window.location.href='/#/item/create';
})

$(".t_edit").click(function(){
    item_id = $(this).attr('data');
    window.location.href='/#/item/edit';
})

$(".t_delete").click(function(){
    if(confirm("确定删除？")){
        var item_id = $(this).attr('data');
        ajaxCommon('item/'+item_id,'','delete',delReturn);
    }
})

function delReturn(){
    window.location.href='/#/item';
}