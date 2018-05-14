/**
* 路由模块
*/
function Router(){
    this.routes = {};
    this.curUrl = '';

    this.route = function(path, callback){
        this.routes[path] = callback || function(){};
    };

    this.refresh = function(){
        this.curUrl = location.hash.slice(1) || '/';
        this.routes[this.curUrl]();
    };

    this.init = function(){
        window.addEventListener('load', this.refresh.bind(this), false);
        window.addEventListener('hashchange', this.refresh.bind(this), false);
    }
}

var R = new Router();
R.init();
//登录
R.route('/login', function() {
    viewSrc('login');
});
//主界面
R.route('/main', function() {
    mainSrc('main');
});
//用户设置
R.route('/user/setting', function() {
    mainSrc('userSetting');
});
//----------------------------------------------
//商品列表
R.route('/item', function() {
    mainSrc('item','index');
});
//新建商品
R.route('/item/create', function() {
    mainSrc('item','create');
});
//修改商品
R.route('/item/edit', function() {
    mainSrc('item','edit');
});
//----------------------------------------------
//单页列表
R.route('/page', function() {
    mainSrc('page','index');
});
//新建单页
R.route('/page/create', function() {
    mainSrc('page','create');
});
//修改单页
R.route('/page/edit', function() {
    mainSrc('page','edit');
});