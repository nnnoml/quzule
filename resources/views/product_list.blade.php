@include('common.header')
@include('common.nav')

<div class="container marketing">

<hr class="featurette-divider-sm">

<!-- Carousel
================================================== -->
<div class="container">

    <h3>{{$product_class_name}} <small></small></h3>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 blog-main">
                @foreach ($product as $key=>$vo)
                <a href="/product/{{$vo['item_class']}}/{{$vo['id']}}">
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <div class="speical speical-default speical-radius">
                        <div class="speical-content">
                            <h3 class="text-special-default" style="min-height:78px;">{{$vo['item_name']}}</h3>
                            <p><img style="width:100px;height:100px;" class="img-responsive img-rounded"
                                    @if($vo['item_avatar'])
                                        src="{{$vo['item_avatar']}}"
                                    @else
                                        src="holder.js/100x100/auto"
                                    @endif" alt="{{$vo['item_name']}}"></p>
                            <p>￥ {{$vo['item_rent_price']}}/月</p>
                        </div>
                    </div>
                </div>
                </a>
                @endforeach
            </div>

            <div class="col-sm-2 col-sm-offset-1 blog-sidebar">
                <div class="sidebar-module">
                    <h4><a href="/product">全部商品</a></h4>
                    <ol class="list-unstyled">
                        @foreach ($menu as $key=>$vo)
                        @if(isset($vo['has_son']) && $key>0)
                        <hr />
                        @endif
                        <li><a href="/product/{{$vo['id']}}">{!! $vo['class_name'] !!}</a></li>
                        @endforeach
                    </ol>
                </div>
            </div><!-- /.blog-sidebar -->
        </div>
    </div>

</div><!-- /.container -->

    <hr class="featurette-divider">

@include('common.footer_nav')
@include('common.footer')