@include('common.header')
@include('common.nav')
<link href="{{asset('static/css')}}/index-signin.css" rel="stylesheet">
<div class="container marketing">
<hr class="featurette-divider">

<div class="container">

    <form class="form-signin">
        <h2 class="form-signin-heading"></h2>
        <label for="inputEmail" class="sr-only">手机号</label>
        <input type="tel" name="user_name" class="form-control" placeholder="手机号" required autofocus>
        <label for="inputPassword" class="sr-only">密码</label>
        <input type="password" name="password" class="form-control" placeholder="密码" required>
<!--        <div class="checkbox">-->
<!--            <label>-->
<!--                <input type="checkbox" value="remember-me"> Remember me-->
<!--            </label>-->
<!--        </div>-->
        <div class="checkbox">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="text-align: left;">
                忘记密码？
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right;">
                快速注册
            </div>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
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
