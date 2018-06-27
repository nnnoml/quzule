//ajax公共方法
function ajaxCommon(url,param,reqType,callback){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    if(typeof(param) == 'undefined')
        param = '';
    if(typeof(reqType) == 'undefined')
        reqType = 'GET';

        $.ajax({
            url: '/indexapi/'+url,
            async:false,//设置同步方式，非异步！  
            cache:false,//严格禁止缓存！ 
            data: param,
            type: reqType,
            dataType: "json",
            success:function(data){
                if(data.code === 1){
                    if(typeof(callback) != 'undefined'){
                        eval(callback)(data);
                    }
                }
                else if(data.code === 302){
                    window.location.href='/'+'login';
                }
                else {
                    alert(data.msg);
                    if(typeof(data.url) !='undefined')
                        window.location.href='/'+data.url;
                }
            },
            error:function(){
                alert('通信失败')
            }
        })
}

$("#loginOut").click(function(){
    ajaxCommon('loginOut','','post',loginOutSuccess);
})
function loginOutSuccess(){
    window.location.href='/';
}