@include('common.header')
@include('common.nav')
<link href="{{asset('static/css')}}/index-blog.css" rel="stylesheet">
<div class="container marketing">

<hr class="featurette-divider-sm">
<!-- Carousel
================================================== -->
<div class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

            <div class="blog-post">
                <h2 class="blog-post-title">{{$page['page_name']}}</h2>
                <p class="blog-post-meta">{{$page['updated_at']}}</p>

                <div class="blog_content">
                    {!!$page['page_detail']!!}
                </div>
            </div><!-- /.blog-post -->

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module">
                <h4>目录</h4>
                <ol class="list-unstyled">
                    @foreach ($page_list as $key=>$vo)
                    <li><a href="/page/{{$vo['id']}}">{{$vo['page_name']}}</a></li>
                    @endforeach
                </ol>
            </div>
        </div><!-- /.blog-sidebar -->

    </div><!-- /.row -->

</div><!-- /.container -->

    <hr class="featurette-divider">

@include('common.footer_nav')
@include('common.footer')