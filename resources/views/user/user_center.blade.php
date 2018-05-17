@include('common.header')
@include('common.nav')
<link href="{{asset('static/css')}}/index-user_center.css" rel="stylesheet">
<div class="container marketing">

    <hr class="featurette-divider-sm">
    <div class="mainContent">
        <div class="presNav">
            <div class="avatar J_setAvatar"><img
                    src="https://static1.aidingmao.com/boss/img/19a135e0-352f-11e7-80d3-77a198583c3a.png"></div>
            <p class="phone">{{$user_info['user_name']}}</p>
            <div class="info"><p>账户信息</p>
                <a class="J_navItem" href="#" id="personalNav">资料信息</a>
                <a class="J_navItem" href="#" id="accountNav">账户资金</a>
                <a class="J_navItem" href="#" id="addrListNav">地址管理</a>
            </div>
            <div class="info"><p>订单中心</p>
                <a class="J_navItem active" href="#" id="orderListNav">订单列表</a>
                <a class="J_navItem" href="#" id="repayNav">缴费计划</a>
            </div>
        </div>
        <div class="orderListCard">
            <div class="pannelHead">订单列表</div>
            <div class="pannelBody">
                <div class="ordersList">
                    <div class="infoHeader">
                        <div class="orders">商品信息</div>
                        <div class="price">单价/数量</div>
                        <div class="deposit">押金</div>
                        <div class="time">租期</div>
                        <div class="status">订单状态</div>
                        <div class="payStatus">支付状态</div>
                        <div class="total">总价</div>
                    </div>
                </div>
                <div class="cancelBox J_cancelBox"><p class="title">取消订单</p>
                    <div>
                        <input class="J_cancelReason" type="radio" data-reason="0" name="reason" checked="">
                        <span class="ml10">不想拍了</span>
                        <input class="J_cancelReason" type="radio" data-reason="1" name="reason">
                        <span class="ml10">拍错</span>
                    </div>
                    <div class="btn J_sureCancel">确定</div>
                </div>
            </div>
        </div>
    </div>
    <hr class="featurette-divider">

@include('common.footer_nav')
@include('common.footer')