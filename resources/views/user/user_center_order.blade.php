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
                <a class="J_navItem active" href="/userCenter">订单列表</a>
                <!--                <a class="J_navItem" href="#" id="repayNav">缴费计划</a>-->
            </div>
            <div class="info"><p>账户信息</p>
<!--                <a class="J_navItem" href="#" id="personalNav">资料信息</a>-->
<!--                <a class="J_navItem" href="#" id="accountNav">账户资金</a>-->
                <a class="J_navItem" href="/userCenterAddress">地址管理</a>
            </div>
        </div>
        <div class="orderListCard">
            <div class="pannelHead">订单列表</div>
            <div class="pannelBody">
                <div class="ordersList">
                    <div class="infoHeader">
                        <div class="orders">商品信息</div>
                        <div class="deposit">租赁数量</div>
                        <div class="deposit">租赁时长</div>
                        <div class="deposit">租赁开始时间</div>
                        <div class="deposit">单价 | 总价</div>
                    </div>

                        @foreach($order_list as $key=>$vo)
                    <div class="ordersItem">
                            @foreach($order_list[$key]['detail'] as $dkey=>$detail)
                            <div class="orders">
                                <div class="ordersInfo">
                                    <img src="{{$detail->item_avatar}}" width="100" height="100">
                                    <p class="ordersName"><a href="/product/{{$detail->item_class}}/{{$detail->item_id}}">{{$detail->item_name}}</a></p>
                                </div>
                                <div class="itemDeposit">
                                    <p><i>{{$detail->rent_num}} 台</i></p>
                                </div>
                                <div class="itemDeposit">
                                    <p><i>{{$detail->rent_month}} 个月</i></p>
                                </div>
                                <div class="itemDeposit">
                                    <p><i>{{$detail->start_time}}</i></p>
                                </div>
                                <div class="itemDeposit">
                                    <p>单价：{{$detail->item_rent_price}}/月</p>
                                    <p>总价：{{$detail->item_rent_price * $detail->rent_num}}/月</p>
                                </div>
                            </div>
                            @endforeach

                        <div class="operInfo"><div class="time">{{$vo->created_at}}</div>
                            <div class="orderId">订单ID: {{$vo->order_id}}</div>
                            <div class="oper">

                                <div class="btn-group" >
                                    @if($vo->order_status == 1 )
                                    <button type="button" class="btn btn-default" onclick="cancle({{$vo->id}})">取消订单</button>
                                    @endif
                                    <button type="button" class="btn btn-default" onclick="show({{$vo->id}})">查看订单</button>
                                </div>

                                <div class="l-link cancel" onclick=""></div>
                                <div class="l-link" onclick=""></div>
<!--                                <a class="l-link btnDefault backBtn" href="tel:4001188695undefined">联系客服</a>-->
                             </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <hr class="featurette-divider">

@include('common.footer_nav')
    <script src="{{asset('static/js')}}/jquery.min.js"></script>
    <script>
        function cancle(id){
            ajaxCommon('cancleOrder','id='+id,'post','ajaxCancle')
        }
        function ajaxCancle(){
            window.location.reload();
        }
        function show(id){
            window.open('/userOrderDoc?id='+id,'_blank');
        }
    </script>
@include('common.footer')