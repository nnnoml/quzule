
window.onsubmit=function(){
    ajaxCommon('user/changePwd',$("#data").serialize(),'post',userSettingReturn);
    return false;
}

function userSettingReturn(data){
    alert(data.msg);
    window.location.href="/";
}