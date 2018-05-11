//获取左侧菜单
ajaxCommon('user/menu','','post',showMenu);
function showMenu(data){
    var html = '<ul class="nav nav-sidebar">';
    data.list.forEach(function(item, index){
        html += '<li><a href="'+item['url']+'">'+item['name']+'</a></li>';
        //TODO 额外做选中项
        //<li class="active"><a href="/">主页</a></li>
    });
    html += '</ul>';

    $("#leftMenu > div").html(html);
}

// 登出
$("#loginout").click(function(){
    ajaxCommon('user/loginOut','','post',loginOutSuccess);
})
function loginOutSuccess(){
    window.location.href='/#/login';
}

mainSrc('main');