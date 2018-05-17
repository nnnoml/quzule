@include('common.header')
@include('common.nav')
<link href="{{asset('static/css')}}/index-signin.css" rel="stylesheet">
<div class="container marketing">
<hr class="featurette-divider-sm">

<div class="container">

    <form class="form-signin">
        <h2 class="form-signin-heading">注册</h2>
        <label for="inputEmail" class="sr-only">手机号</label>
        <input type="tel" name="user_name" class="form-control" placeholder="手机号" required autofocus>
        <label for="inputPassword" class="sr-only">短信验证码</label>
        <input type="password" name="password" class="form-control" placeholder="验证码" required>
        <label for="inputPassword" class="sr-only">密码</label>
        <input type="password" name="password" class="form-control" placeholder="密码" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">reg in</button>
    </form>

</div> <!-- /container -->

<hr class="featurette-divider">

@include('common.footer_nav')
    <script src="{{asset('static/js')}}/jquery.min.js"></script>
    <script>
        window.onsubmit=function(){
            ajaxCommon('login',$("form").serialize(),'post',loginSuccess);
            return false;
        }
        function loginSuccess(){
            window.location.href='/';
        }
    </script>
@include('common.footer')
