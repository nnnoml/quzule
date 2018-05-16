
check_status = false //是否审核过 默认没审核过
//开关
$('.btn-toggle > a').click(function(){
    if(check_status) return;
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
    $("input[name='comp_name']").val(real_data.comp_name);
    $("input[name='comp_reg_num']").val(real_data.comp_reg_num);
    $("input[name='comp_reg_time']").val(real_data.comp_reg_time);
    $("input[name='legal_person_name']").val(real_data.legal_person_name);
    $("input[name='legal_person_id']").val(real_data.legal_person_id);


    $("#license").html(format_a_img(real_data.license));
    $("#legal_person_card").html(format_a_img(real_data.legal_person_card_front)+format_a_img(real_data.legal_person_card_back));

    var area_img_list = '';
    real_data.area_img.forEach(function(item, index){
        area_img_list += format_a_img(item);    
    });
    $("#area_img").html(area_img_list);

    if(real_data.check_status == 1){
        $('.btn-toggle > a').eq(0).trigger('click');
        check_status = true;
    }
    else if (real_data.check_status == 2){
        $('.btn-toggle > a').eq(1).trigger('click');
        check_status = true;
    }

}

function format_a_img(url){
    return "<a href="+url+" target='_blank'><img src='"+url+"' /></a>";
}

window.onsubmit=function(){
    if(check_status) return false;
    var post_data = {
        'check_status':$("#check_status").val()
    };
    ajaxCommon('apply/'+id,post_data,'put',updateReturn);
    return false;
}

function updateReturn(){
    window.location.href=admin_url+'/#/'+'apply'
}




