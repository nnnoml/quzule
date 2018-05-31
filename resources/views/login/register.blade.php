@include('common.header')
@include('common.nav')
<link href="{{asset('static/css')}}/index-regist.css" rel="stylesheet">
<div class="container marketing">
<hr class="featurette-divider-sm">

<div class="container">

    <form class="form-reg">
        <h2 class="form-signin-heading">注册</h2>
        <label for="inputEmail" class="sr-only">手机号</label>
        <input type="tel" name="tel" class="form-control" placeholder="手机号" required autofocus>

        <label for="inputPassword" class="sr-only">密码</label>
        <input type="password" name="password" class="form-control" placeholder="密码" required>

        <label for="inputPassword" class="sr-only">再次输入密码</label>
        <input type="password" name="password2" class="form-control" placeholder="再次输入密码" required>

        <div class="input-group">
            <input type="text" name="code" class="form-control" placeholder="验证码">
            <span class="input-group-btn">
                <button class="btn btn-default" id="get_code" type="button">获取验证码</button>
            </span>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">注册</button>
    </form>

</div> <!-- /container -->

<hr class="featurette-divider">

@include('common.footer_nav')
    <script src="{{asset('static/js')}}/jquery.min.js"></script>
    <script>
        window.onsubmit=function(){
            ajaxCommon('regist',$("form").serialize(),'post',registSuccess);
            return false;
        }
        function registSuccess(){
            alert('注册成功');
            window.location.href='/';
        }

        var time = 60;
        var code_status = true;
        function descTime(){
            if(time>0){
                time--;
                $("#get_code").html('还剩'+time+'秒 可重发');
                setTimeout("descTime()",1000);
            }
            else{
                code_status = true;
                time = 60;
                $("#get_code").html('获取验证码');
            }
        }

        function checkPhone(phone){
            if((/^1\d{10}$/.test(phone)))
                return true;
            else
                return false;
        }

        $("#get_code").click(function(){
            var tel = $("input[name='tel']").val();
            var psw = $("input[name='password']").val();
            var psw2 = $("input[name='password2']").val();
            if(!checkPhone(tel)){
                alert('请填写正确的手机号码');
            }
            else if(psw.length<6){
                alert('密码不少于6位');
            }
            else if(psw != psw2){
                alert('两次密码不一致');
            }
            else if(code_status){
                ajaxCommon('sms','tel='+tel,'post',getSmsSuccess);
            }
        });
        function getSmsSuccess(data){
            alert(data.msg);
            code_status = false;
            descTime($(this));
        }
    </script>
@include('common.footer')
