ajaxCommon('itemClass','','get',ajaxReturn);

function ajaxReturn(data){
    var html = '';
    data.list.forEach(function(item, index){
        html += '<tr>';
        html += '<td>'+item['id']+'</td>';
        html += '<td>'+item['class_name']+'</td><td>';
        if(item['pid'] == 0)
            html += '<button class="btn btn-default btn-sm t_create" data="'+item['id']+'" type="button">新增子分类</button> ';
        html += '<button class="btn btn-default btn-sm t_edit" data="'+item['id']+'" type="button">修改</button> ';
        html += '<button class="btn btn-default btn-sm t_delete" data="'+item['id']+'" type="button">删除</button></td>';
        html += '</tr>';        
    });

    $("#tbody").html(html);
}


$("#createItem").click(function (){
    pid = 0;
    window.location.href=admin_url+'/#/'+'itemClass/create';
})

$(".t_create").click(function(){
    pid = $(this).attr('data');
    window.location.href=admin_url+'/#/'+'itemClass/create';
})

$(".t_edit").click(function(){
    pid = $(this).attr('data');
    window.location.href=admin_url+'/#/'+'itemClass/edit';
})

$(".t_delete").click(function(){
    if(confirm("确定删除？")){
        var id = $(this).attr('data');
        ajaxCommon('itemClass/'+id,'','delete',delReturn);
    }
})

function delReturn(){
    window.location.reload();
}