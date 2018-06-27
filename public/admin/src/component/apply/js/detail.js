//开关
$('.btn-toggle > a').click(function(){
    if($(this).hasClass('active')) return;
    else{
        $(this).addClass('active');
        $(this).addClass('btn-primary');
        $(this).siblings('a').removeClass('active');
        $(this).siblings('a').removeClass('btn-primary');
        $(this).siblings('a').addClass('btn-default');
        $("#check_status").val($(this).attr('data'));
    }
});

//如果列表页没传递id过来则跳回去
if(typeof(id) == 'undefined'){
    window.location.href=admin_url+'/#/'+'apply'
}
else{
    ajaxCommon('apply/'+id+'/edit','','get',ajaxReturn);
}


function ajaxReturn(data){
    var real_data = data.data[0];

    Object.keys(real_data).forEach(function(key){
        if(key == 'monitor_account')
            $("input[name='"+key+"']").val(real_data[key]);
        else if(key == 'mark' ){
            $("textarea[name='"+key+"']").val(real_data[key]);
        }
        else if(key == 'license' || key == 'wenhua_input' || key == 'xiaofang_input' || key=='wangjian_input' || key == 'legal_person_card_front' || key == 'legal_person_card_back')
            $("#"+key).html(format_a_img(real_data[key]));

        else if(key == 'kuandai_input' || key == 'zufang_input' || key == 'mentou_input' || key == 'neibu_input' || key == 'xiaofangtongdao_input'
            || key == 'zhengxin_input' || key == 'other1_input'|| key == 'other2_input'|| key == 'other3_input'){
            if(real_data[key] != null){
                var m = real_data[key].split(",");
                if(m.length<=1)
                    $("#"+key).html(format_a_img(real_data[key]));
                else{
                    var foo = '';
                    m.forEach(function(item, index){
                        foo += format_a_img(item);
                    });
                    $("#"+key).html(foo);
                }
            }
        }
    });

    if(real_data.check_status == 1){
        $('.btn-toggle > a').eq(0).trigger('click');
    }
    else if (real_data.check_status == 2){
        $('.btn-toggle > a').eq(1).trigger('click');
    }
    else if (real_data.check_status == 3){
        $('.btn-toggle > a').eq(2).trigger('click');
    }

}

function format_a_img(url){
    return "<a href="+url+" target='_blank'><img src='"+url+"' /></a>";
}

window.onsubmit=function(){
    var post_data = {
        'check_status':$("#check_status").val()
    };
    ajaxCommon('apply/'+id,post_data,'put',updateReturn);
    return false;
}

function updateReturn(){
    window.location.href=admin_url+'/#/'+'apply'
}




