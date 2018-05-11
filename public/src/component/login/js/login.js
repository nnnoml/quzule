
window.onsubmit=function(){
    ajaxCommon('login',$("#login_data").serialize(),'post',loginSuccess);
    return false;
}

function loginSuccess(data){
    window.location.href="/";
}