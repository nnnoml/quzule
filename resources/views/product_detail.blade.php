@include('common.header')
@include('common.nav')
<link href="{{asset('static/vendor/smoothproducts/css')}}/default.css" rel="stylesheet">
<link href="{{asset('static/vendor/smoothproducts/css')}}/smoothproducts.css" rel="stylesheet">

<div class="container marketing">

<hr class="featurette-divider">

<!-- Carousel
================================================== -->
<div class="container">
    <div class="container">

        <div class="page col-md-6">
            <div class="sp-loading"><img src='{{asset('static/vendor/smoothproducts/images')}}/sp-loading.gif' alt=""><br>读取图片</div>
            <div class="sp-wrap">
                @foreach($img_list as $key=>$vo)
                    <a href="{{$vo['img_url']}}"><img src='{{$vo['img_url']}}' alt=""></a>
                @endforeach
<!--                <a href="./static/vendor/smoothproducts/images/1.jpg"><img src='./static/vendor/smoothproducts/images/1.jpg' alt=""></a>-->
<!--                <a href="images/2.jpg"><img src='./static/vendor/smoothproducts/images/2_tb.jpg' alt=""></a>-->
<!--                <a href="images/3.jpg"><img src='./static/vendor/smoothproducts/images/3_tb.jpg' alt=""></a>-->
<!--                <a href="images/4.jpg"><img src='./static/vendor/smoothproducts/images/4_tb.jpg' alt=""></a>-->
<!--                <a href="images/5.jpg"><img src='./static/vendor/smoothproducts/images/5_tb.jpg' alt=""></a>-->
<!--                <a href="images/6.jpg"><img src='./static/vendor/smoothproducts/images/6_tb.jpg' alt=""></a>-->
            </div>
        </div>

        <dl class="dl-horizontal col-md-6">
            <h3>{{$product['item_name']}}<small>参数</small></h3>
            <dt>价格</dt><dd>{{$product['item_price']}}</dd>
            <dt>租价/月</dt><dd>{{$product['item_rent_price']}}</dd>
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
                    <img class="img-750" src="https://static1.aidingmao.com/boss/img/3a7a7850-ec6b-11e7-b067-b3801628a039.jpg">
                    <img class="img-750" src="https://static1.aidingmao.com/boss/img/4c12dd50-ec6b-11e7-b067-b3801628a039.jpg">
                    <img class="img-750" src="https://static1.aidingmao.com/boss/img/51626c30-ec6b-11e7-b067-b3801628a039.jpg">
                    <img class="img-750" src="https://static1.aidingmao.com/boss/img/712a41a0-ec6b-11e7-b067-b3801628a039.jpg">
                    <img class="img-750" src="https://static1.aidingmao.com/boss/img/79ccf320-ec6b-11e7-b067-b3801628a039.jpg">
                    <img class="img-750" src="https://static1.aidingmao.com/boss/img/5cc4c000-275d-11e8-bb1b-c9a946405ae9.jpg">
                    <img class="img-750" src="https://static1.aidingmao.com/boss/img/8ac17700-ec6b-11e7-b067-b3801628a039.jpg">
                    <img class="img-750" src="https://static1.aidingmao.com/boss/img/93f82b20-ec6b-11e7-b067-b3801628a039.jpg">
                    <img class="img-750" src="https://static1.aidingmao.com/boss/img/9e9e4dc0-ec6b-11e7-b067-b3801628a039.jpg">
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
<script>
    $(window).load(function() {
        $('.sp-wrap').smoothproducts();
    });
</script>
@include('common.footer')