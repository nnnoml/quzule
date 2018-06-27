@include('common.header')
@include('common.nav')
<link href="{{asset('static/css')}}/index-user_center.css" rel="stylesheet">
<div class="container marketing">

    <hr class="featurette-divider-sm">
    <div class="mainContent">
        <div class="presNav">
            <div class="avatar">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            </div>
            <p class="phone">{{$user_info['user_name']}}</p>
            <div class="info"><p>订单中心</p>
                <a class="J_navItem" href="#" id="orderListNav">订单列表</a>
                <!--                <a class="J_navItem" href="#" id="repayNav">缴费计划</a>-->
            </div>
            <div class="info"><p>账户信息</p>
<!--                <a class="J_navItem" href="#" id="personalNav">资料信息</a>-->
<!--                <a class="J_navItem" href="#" id="accountNav">账户资金</a>-->
                <a class="J_navItem" href="#" id="addrListNav">地址管理</a>
            </div>
        </div>
    </div>
    <hr class="featurette-divider">

@include('common.footer_nav')
@include('common.footer')