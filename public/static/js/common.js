/**
 * 页面替换
 * jquery load view 
 * @param {string} dir 文件夹标识
 * @param {string} name 文件标识
 */
function viewSrc(dir,name){
    if(typeof(name)=='undefined')
        name = dir;

    var view_url = './src/component/'+dir+'/view/'+name+'.html';
    //替换整个页面
    $('#main').load(view_url);
}

//读取目标view 替换maincenter
function mainSrc(dir,name){
    if(typeof(name)=='undefined')
        name = dir;
    var view_url = './src/component/'+dir+'/view/'+name+'.html';
    $('#main_center').load(view_url);
}

/**
 * 引入组件的js
 * @param {string} dir 文件夹标识
 * @param {string} name 文件标识
 */
function jsSrc(dir,name){
    if(typeof(name)=='undefined')
        name = dir;
    // document.write('<script src="./src/component/'+name+'/js/'+name+'.js"><\/script>');
    var newscript = document.createElement('script');  
        newscript.setAttribute('type','text/javascript');  
        newscript.setAttribute('src','./src/component/'+dir+'/js/'+name+'.js');  
    var head = document.getElementsByTagName('html')[0];
        head.appendChild(newscript);  
}

/**
 * 引入组件的css
 * @param {string} dir 文件夹标识
 * @param {string} name 文件标识
 */
function cssSrc(dir,name){
    if(typeof(name)=='undefined')
        name = dir;
    var link = document.createElement('link');
        link.type = 'text/css';
        link.rel = 'stylesheet';
        link.href = './src/component/'+dir+'/css/'+name+'.css';
    var head = document.getElementsByTagName('head')[0];
        head.appendChild(link);
}
//csrf
function csrf(){
    
    var meta_csrf = $("meta[name='csrf-token']").attr("content");
    if(typeof(meta_csrf) != 'undefined')
        return true;
    else{
        var boolen = '';
        $.ajax({
            url: 'admin.php/csrf',
            async:false,  
            cache:false,
            type: 'get',
            dataType: "html",
            success:function(result){
                var oMeta = document.createElement('meta');
                    oMeta.name = 'csrf-token';
                    oMeta.content = result;
                document.getElementsByTagName('head')[0].appendChild(oMeta);
                boolen = true;
            },
            error:function(){
                boolen = false;
            }
        })
      return boolen;
    }
}
//ajax公共方法
function ajaxCommon(url,param,reqType,callback){
    //先拿csrf
    if(csrf()){
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
            url: 'admin.php/adminapi/'+url,
            async:false,//设置同步方式，非异步！  
            cache:false,//严格禁止缓存！ 
            data: param,
            type: reqType,
            dataType: "json",
            success:function(data){
                if(data.code === 1){
                    if(typeof(callback) != 'undefined')
                        callback(data);
                }
                else if(data.code === 302){
                    window.location.href='/#/login';
                }
                else {
                    $('#alertModal').modal();
                    $('#alertModal .modal-title').html('提示');
                    $('#alertModal .modal-body').html(data.msg);
                }
            },
            error:function(){
                $('#alertModal').modal();
                $('#alertModal .modal-title').html('提示');
                $('#alertModal .modal-body').html('通信失败');
            }
        })
    }
}