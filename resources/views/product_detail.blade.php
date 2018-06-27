@include('common.header')
@include('common.nav')
<link href="{{asset('static/vendor/smoothproducts/css')}}/default.css" rel="stylesheet">
<link href="{{asset('static/vendor/smoothproducts/css')}}/smoothproducts.css" rel="stylesheet">
<link href="{{asset('static/vendor/bootstrap_timer')}}/bootstrap-datetimepicker.css" rel="stylesheet">

<div class="container marketing">

<hr class="featurette-divider">

<div class="container">
    <div class="container">

        <div class="page col-md-6">
            <div class="sp-loading"><img src='{{asset('static/vendor/smoothproducts/images')}}/sp-loading.gif' alt=""><br>读取图片</div>
            <div class="sp-wrap">
                @foreach($img_list as $key=>$vo)
                    <a href="{{$vo['img_url']}}"><img src='{{$vo['img_url']}}' alt=""></a>
                @endforeach
            </div>
        </div>

        <dl class="dl-horizontal col-md-6">
            <h3>{{$product['item_name']}}<small>参数</small></h3>
            <div class="col-md-8">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <td>价格</td>
                        <td>{{$product['item_price']}}</td>
                    </tr>
                    <tr>
                        <td>租价/月</td>
                        <td>{{$product['item_rent_price']}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="clearfix"></div>

            <div class="form-group">
                <h5>租赁开始时间</h5>
                <div class="input-group date form_date_start col-md-4">
                    <input class="form-control" name="start_time" size="16" type="text" value="{{date('Y-m-d')}}" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                </div>
            </div>

            <div class="clearfix"></div>

            <div id="zuqi" class="form-group" data="1">
                <h5>租赁周期</h5>
<!--                <button class="btn btn-primary" value="1" type="button">1个月</button>-->
<!--                <button class="btn btn-default" value="3" type="button">3个月</button>-->
<!--                <button class="btn btn-default" value="6" type="button">半年</button>-->
                <button class="btn btn-default" value="12" type="button">1年</button>
                <button class="btn btn-default" value="24" type="button">2年</button>
                <button class="btn btn-default" value="36" type="button">3年</button>
            </div>
            <div class="clearfix"></div>

            <div class="form-group" style="overflow: hidden">
                <h5>租赁数量</h5>
                <div class="col-xs-6" style="padding-left:0px;">
                    <button class="btn btn-default" id="sub" type="button">-</button>
                    <input id="comp_num" class="btn btn-default" style="width:40px;" value="1">
                    <button class="btn btn-default" id="add" type="button">+</button>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="form-group">
                <span class="money red">￥</span>
                <span class="day_price red"><label></label>/天</span>
                <span class="money">￥</span>
                <span class="month_price"><label></label>/月</span>
                <span class="total_value">设备价值:￥<label></label></span>
            </div>

            <div class="clearfix"></div>

            <button type="button" class="btn btn-primary add_cart"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> 加入购物车</button>

            <a href="/cart" type="button" class="btn btn-danger add_cart"><span class="glyphicon glyphicon-yen" aria-hidden="true"></span> 立即租赁</a>
        </dl>

        <div style="clear:both"></div>


        <ul class="nav nav-tabs">
            <li class="active"><a href="#p1" data-toggle="tab">商品详情</a></li>
            <li><a href="#p2" data-toggle="tab">商品参数</a></li>
            <li><a href="#p3" data-toggle="tab">下单流程</a></li>
        </ul>
        <div class="tab-content">
            <div class="fade in tab-pane active" id="p1">{!!$product['item_detail']!!}</div>
            <div class="fade tab-pane " id="p2">{!!$product['item_parame']!!}</div>
            <div class="fade tab-pane " id="p3">
                <div class="readme J_tabCon" style="text-align:center">
                    <img src="{{asset('static/img/')}}/liucheng.jpg"/>
                </div>
            </div>
        </div>



    </div>

</div><!-- /.container -->

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

    <!-- FOOTER -->

@include('common.footer_nav')
<script src="{{asset('static/js')}}/jquery.min.js"></script>
<script src="{{asset('static/vendor/smoothproducts/js')}}/smoothproducts.js"></script>
<script src="{{asset('static/vendor/bootstrap_timer')}}/bootstrap-datetimepicker.js"></script>
<script>
    $(window).load(function() {
        $('.sp-wrap').smoothproducts();
    });
    //周期按钮
    $("#zuqi > button").click(function(){
        $("#zuqi > button").each(function(){
            if($(this).hasClass('btn-primary')){
                $(this).removeClass('btn-primary');
                $(this).addClass('btn-default');
            }
        })
        $(this).removeClass('btn-default');
        $(this).addClass('btn-primary');
        $("#zuqi").attr('data',$(this).val())
        price();
    })

    //数量加减
    $("#add").click(function(){
        var num = $("#comp_num").val();
        num++;
        $("#comp_num").val(num);
        price();
    })

    $("#sub").click(function(){
        var num = $("#comp_num").val();
        if(num>1)
            num--;
        $("#comp_num").val(num);
        price();
    })

    //时间插件
    var newDate = new Date();
    var t = newDate.toJSON();
    $('.form_date_start').datetimepicker({
        format: 'yyyy-mm-dd',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0,
        startDate:new Date(t),
    });

    function price(){
        var time = $("#zuqi").attr('data');
        var num = $("#comp_num").val();
        var rent_pride = {{$product['item_rent_price']}};
        var total_price =  {{$product['item_price']}};

        if(time>0 && num>0){
            $(".day_price > label").html(((rent_pride*num)/30).toFixed(2));
            $(".month_price > label").html(rent_pride*num);
            $(".total_value > label").html(total_price*num);
        }
    }
    price();

    $(".add_cart").click(function(){
        //已登陆
        @if (isset($user_info['user_id']))
            var post = {
                'item_id': {{$product['id']}},
                'start_time': $("input[name='start_time']").val(),
                'rent_month': $("#zuqi").attr('data'),
                'rent_num' : $("#comp_num").val()
            }
            ajaxCommon('addCart',post,'post',applySuccess);
        //未登陆
        @else
            alert('请先登陆')
        @endif
    })

    function applySuccess(data){
        alert(data.msg);
    }
</script>
@include('common.footer')