@include('common.header')
@include('common.nav')

<!-- Carousel ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide" src="{{asset('static/img')}}/banner1.jpg" alt="First slide">
<!--            <div class="container">-->
<!--                <div class="carousel-caption">-->
<!--                    <h1>Example headline.</h1>-->
<!--                    <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>-->
<!--                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>-->
<!--                </div>-->
<!--            </div>-->
        </div>
        <div class="item">
            <img class="second-slide" src="{{asset('static/img')}}/banner2.jpg" alt="Second slide">
<!--            <div class="container">-->
<!--                <div class="carousel-caption">-->
<!--                    <h1>Another example headline.</h1>-->
<!--                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>-->
<!--                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>-->
<!--                </div>-->
<!--            </div>-->
        </div>
        <div class="item">
            <img class="third-slide" src="{{asset('static/img')}}/banner3.jpg" alt="Third slide">
<!--            <div class="container">-->
<!--                <div class="carousel-caption">-->
<!--                    <h1>One more for good measure.</h1>-->
<!--                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>-->
<!--                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-lg-4">
<!--            <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">-->
            <h2>0元押金</h2>
            <p>只要您芝麻信用分在600以上，就有机会0押金租赁</p>
            <p><a class="btn btn-default" href="/page/1" role="button">More &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
<!--            <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">-->
            <h2>按月缴租</h2>
            <p>按月缴纳租金 省时省心</p>
            <p><a class="btn btn-default" href="/page/1" role="button">More &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
<!--            <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">-->
            <h2>退机无忧</h2>
            <p>正常硬件故障或正常租期结束导致的机器退回，趣租乐承担所有运费</p>
            <p><a class="btn btn-default" href="/page/1" role="button">More &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->

    <h3>全部商品 <small>&raquo;</small></h3>
    <div class="container">
        <div class="row">
            @foreach($product as $vo)
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="speical speical-default speical-radius">
                    <div class="speical-content">

                        <h3 class="text-special-default">{{$vo['item_name']}}</h3>
                        <p><a href="/product/{{$vo['item_class']}}/{{$vo['id']}}">
                            <img style="width:240px;height:240px;" class="img-responsive img-rounded"
                            @if($vo['item_avatar'])
                                src="{{$vo['item_avatar']}}"
                            @else
                                src="holder.js/240x120/auto"
                            @endif"
                                 alt="{{$vo['item_name']}}">
                            </a></p>
                        <p>￥ {{$vo['item_rent_price']}}/月</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

@include('common.footer_nav')
@include('common.footer')