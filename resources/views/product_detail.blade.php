@include('common.header')
@include('common.nav')
<link href="{{asset('static/vendor/smoothproducts/css')}}/default.css" rel="stylesheet">
<link href="{{asset('static/vendor/smoothproducts/css')}}/smoothproducts.css" rel="stylesheet">
<hr class="featurette-divider">

<!-- Carousel
================================================== -->
<div class="container">
    <div class="container">

        <div class="page col-md-6">
            <div class="sp-loading"><img src='./static/vendor/smoothproducts/images/sp-loading.gif' alt=""><br>LOADING IMAGES</div>
            <div class="sp-wrap">
                <a href="./static/vendor/smoothproducts/images/1.jpg"><img src='./static/vendor/smoothproducts/images/1.jpg' alt=""></a>
                <a href="images/2.jpg"><img src='./static/vendor/smoothproducts/images/2_tb.jpg' alt=""></a>
                <a href="images/3.jpg"><img src='./static/vendor/smoothproducts/images/3_tb.jpg' alt=""></a>
                <a href="images/4.jpg"><img src='./static/vendor/smoothproducts/images/4_tb.jpg' alt=""></a>
                <a href="images/5.jpg"><img src='./static/vendor/smoothproducts/images/5_tb.jpg' alt=""></a>
                <a href="images/6.jpg"><img src='./static/vendor/smoothproducts/images/6_tb.jpg' alt=""></a>
            </div>
        </div>

        <dl class="dl-horizontal col-md-6">
            <h3>好多鞋子好多鞋子好多鞋子好多鞋子好多鞋子好多鞋子 <small>参数</small></h3>
            <dt>价格</dt><dd>20</dd>
            <dt>租价</dt><dd>50</dd>
        </dl>
        <div style="clear:both"></div>


        <ul class="nav nav-tabs">
            <li><a href="#p1" data-toggle="tab">十元套餐</a></li>
            <li class="active"><a href="#p2" data-toggle="tab">二十元套餐</a></li>
            <li><a href="#p3" data-toggle="tab">三十元套餐</a></li>
        </ul>
        <div class="tab-content">
            <div class="fade tab-pane" id="p1">十元套餐  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio enim labore officiis vitae. Ab adipisci,
                assumenda deleniti dolorem dolores ea eligendi inventore ipsa itaque nesciunt, nulla officia ut veniam voluptas?</div>
            <div class="fade in tab-pane active" id="p2">二十元套餐  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio enim labore officiis vitae. Ab adipisci,
                assumenda deleniti dolorem dolores ea eligendi inventore ipsa itaque nesciunt, nulla officia ut veniam voluptas?</div>
            <div class="fade tab-pane " id="p3">三十元套餐  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio enim labore officiis vitae. Ab adipisci,
                assumenda deleniti dolorem dolores ea eligendi inventore ipsa itaque nesciunt, nulla officia ut veniam voluptas?</div>
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