<div class="navbar-wrapper">
    <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">趣租乐</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li @if(isset($nav) && $nav=="home") class="active" @endif><a href="/">Home</a></li>
                        <li class="dropdown @if(isset($nav) && $nav=="product") active @endif">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">全部商品 <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/product">全部商品</a></li>
                                @foreach ($menu as $key=>$vo)
                                @if(isset($vo['has_son']) && $key>0)
                                <li role="separator" class="divider"></li>
                                @endif
                                <li><a href="/product/{{$vo['id']}}">{!! $vo['class_name'] !!}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li @if(isset($nav) && $nav=="apply") class="active" @endif><a href="/userApply">免押金申请</a></li>
                        <li @if(isset($nav) && $nav=="page1") class="active" @endif><a href="/page/1">租赁规则</a></li>
                        <li @if(isset($nav) && $nav=="page2") class="active" @endif><a href="/page/2">电子合同签署流程</a></li>
                    </ul>
                    <ul class="nav navbar-nav" style="float:right;">
                        @if (isset($user_info['user_id']))
                        <li>
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">欢迎你 {{$user_info['user_name']}} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/cart" >购物车</a></li>
                                <li><a href="/userCenter" >个人中心</a></li>
                                <li><a href="#" id="loginOut">退出登陆</a></li>
                            </ul>
                        </li>
                        @else
                            <li @if(isset($nav) && $nav=="login") class="active" @endif><a href="/login">登录</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

    </div>
</div>