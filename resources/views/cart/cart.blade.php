@include('common.header')
@include('common.nav')
<link href="{{asset('static/css')}}/index-cart.css" rel="stylesheet">
<div class="container marketing">

    <hr class="featurette-divider-sm">

    <div class="mainContent">
        <div class="cartCon">
            <div class="cartTitle">
                购物车
            </div>
            <div class="goodsList">
                <div class="infoHeader clear">
                    <div class="nameHd">商品名称</div>
                    <div class="numHd">租赁数量</div>
                    <div class="numHd">租赁时长</div>
                    <div class="numHd">租赁开始时间</div>
                    <div class="numHd">单价 | 总价</div>
                    <div class="numHd">操作</div>
                </div>

                @foreach($cart_list as $key=>$vo)
                <div class="goodsItem">
                    <div class="goods clear">
                        <div class="goodsInfo clear">
                            <img src="{{$vo->item_avatar}}" width="100" height="100" />
                            <div class="goodsName">
                                <a target="_blank" href="/product/{{$vo->item_class}}/{{$vo->item_id}}">{{$vo->item_name}}</a>
                            </div>
                        </div>
                        <div class="goodsNum">{{$vo->rent_num}} 台</div>
                        <div class="goodsNum">{{$vo->rent_month}} 个月</div>
                        <div class="goodsNum">{{$vo->start_time}}</div>
                        <div class="goodsPrice">
                            单价：{{$vo->item_rent_price}}/月 <br/>
                            总价：{{$vo->item_rent_price * $vo->rent_num}}/月</div>
                        <div class="goodsNum"><button type="button" class="btn btn-warning" onclick="deleteCart({{$vo->id}})">删除</button></div>

                    </div>
                    <div class="rentalInfo clear">
                    </div>
                </div>
                @endforeach

            </div>
            @if(count($cart_list)>0)
            <div class="rentalSummary">
                <div class="addressInfo">
                    <h4>收货地址</h4>

                    <div class="addressInfo_main">
                        <ul>
                            @foreach($address as $index=>$vo)
                            <li><input type="radio" @if($index == 0) checked @endif id="address{{$vo->id}}" name="address" value="{{$vo->id}}" />
                                <label for="address{{$vo->id}}">{{$vo->address}} {{$vo->user_name}} {{$vo->user_tel}}</label>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
                <div class="payInfo">
                    <p>应付租金/月：<span class="totalPayMoney">{{$rent_pay}}</span></p>
                    <p>总计数量：<span class="totalnum">{{$rent_num}}</span></p>
                    <button type="button" onclick="addOrder()" class="btn btn-primary">提交订单</button>
                </div>
            </div>
            @endif
        </div>
    </div>
    <hr class="featurette-divider" />
@include('common.footer_nav')
    <script src="{{asset('static/js')}}/jquery.min.js"></script>
    <script>
        //删除购物车
        function deleteCart(id){
            ajaxCommon('deleteCart','id='+id,'get',deleteReturnAjax);
        }
        function deleteReturnAjax(){
            window.location.reload();
        }
        function addOrder(){
            var address_id  = $("input[name='address']:checked").val();
            ajaxCommon('addOrder','address_id='+address_id,'get',addOrderAjax);
        }
        function addOrderAjax(data){
            alert(data.msg);
            window.location.href='/userCenter';
        }
    </script>
@include('common.footer')