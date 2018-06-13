<!DOCTYPE html>
<link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @yield('title')
    </title>
    <link rel="shortcut icon" href="image/favicon.png" type="image/x-icon"/>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body style="margin: 0px">
<div class="page">
    <div class="header">
        <div class="logo" style="background: #8fcc6d">
            <div class="custom-container">
                <a href="/" class="custom-logo-link" rel="home" itemprop="url"><img width="275" height="150" src="/image/logo1.png" class="custom-logo" alt="logo-f" itemprop="logo" style="    margin: 10px 0px;"></a>
            </div>
        </div>

        <div class="custom-container" style="padding-top: 5px">

            <div class="nav-wrapper" style="float: left;width: 100%;background: #f6f6f6;border: 1px solid #d9d8d8;">

                <div class="menu-menu-1-container">
                    <button data-target="#myNavbar" data-toggle="collapse" class="navbar-toggle" type="button" aria-expanded="true" style="background: red">
                        <span class="sr-only">Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <ul id="primary-menu" class="menu menu-custom" style="list-style: none; position: relative;">
                        <li>
                            <a class="menu-active" href="{{route('home')}}">Trang chủ</a>
                        </li>
                        <li>
                            <a class="menu-active" href="{{route('news_list')}}">Tin Tức</a>
                            <span class="sub-toggle"> <i class="fa fa-angle-right"></i>
                                </span>
                        </li>
                        <li>
                            <?php
                                $categoryProduct = \App\Models\CategoriesProduct::all();
                            ?>
                            <a class="menu-active" href="{{route('list_news_products')}}">Sản Phẩm</a>
                            <ul class="sub-menu" style="padding: 0px">
                                @foreach($categoryProduct as $value)
                                <li>
                                    <a href="{{route('list_news_products_category', $value['id'])}}" style="border: none">
                                        {{$value['name']}}
                                    </a>
                                </li><br>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a class="menu-active" href="{{route('list_news_farms')}}">Tin Nông Nghiệp</a>
                            <span class="sub-toggle"> <i class="fa fa-angle-right"></i>
                                </span>
                        </li>
                        <li>
                            <a class="menu-active" href="{{route('list_news_company')}}">Tin Doanh Nghiệp</a>

                            <span class="sub-toggle"> <i class="fa fa-angle-right"></i> </span>
                        </li>
                        <li>
                            <a class="menu-active" href="{{route('videos')}}">Video</a>
                            <span class="sub-toggle"> <i class="fa fa-angle-right"></i>
                                </span>
                        </li>
                        <li><a class="menu-active" href="{{route('list_image')}}">Hình Ảnh</a></li>
                        <li><a class="menu-active" href="{{route('form_support')}}">Tư vấn </a></li>
                        <!--<li style="float: right;">-->
                        <!--    <a href="#" style="border: none">-->
                        <!--        <span class="glyphicon glyphicon-search"></span>-->
                        <!--    </a></li>-->
                    </ul>
                </div>
            </div><!-- .nav-wrapper -->

            </nav><!-- #site-navigation -->

        </div>
    </div>
    <div class="clearfix"></div>
    <div class="custom-container" style="width: 100%">
        <div class="" style="width: 65%; float: left">
            @yield('content')
        </div>
        <div class="" style="width: 30%; float: right">
            <div class="tin-tuc-title" style=" padding: 8px 16px; padding-left: 0px">
                <button type="button" class="btn btn-success" style=" background: #8fcc6d; color: #fff;text-transform: uppercase; font-weight: 500; display: block;border-color: snow; border-radius: 0px;">Sản Phẩm</button>
            </div>

            <div class="single-post clearfix">
                <?php $newsProduct = \App\Models\ItemProduct::limit(6)->get();?>
                @foreach($newsProduct as $product)
                    <div class="item-news clearfix" style="padding: 15px 0px; border-bottom: 1px solid #e1e1e1;">
                    <div class="post-thumb" style="width: 30%; float: left">
                        <a href="{{route('detail_news_products',['title' => str_slug($product['title'], '-'),'id' => $product['id']])}}">
                            <img src="/upload/{{$product['image']}}" style="width: 100%">
                        </a>
                    </div>
                    <div class="post-caption clearfix" style="width: 65%; float: left; margin-left: 15px;">
                        <h4 class="small-font" style="font-size: 14px; font-weight: 500; margin-top: 0px;">
                            <a href="{{route('detail_news_products',['title' => str_slug($product['title'], '-'),'id' => $product['id']])}}" style="color: #333">
                               {{$product['title']}}
                            </a>
                        </h4>
                        <div class="post-meta">
                                <span class="posted-on" style="color: #aaaaaa; font-size: 12px">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                        {{date_format(date_create($product['create_at']), 'd/m/Y')}}
                                </span>
                        </div>
                    </div><!-- .post-caption -->
                </div>
                @endforeach
                <div class="tin-tuc-title" style=" padding: 8px 16px; padding-left: 0px">
                    <button type="button" class="btn btn-success" style=" background: #8fcc6d; color: #fff;text-transform: uppercase; font-weight: 500; display: block;border-color: snow; border-radius: 0px;">Video</button>
                </div>
                <?php $videos = \App\Models\Videos::limit(2)->orderBy('created_at', 'desc')->get();?>
                    @foreach($videos as $video)
                        <strong>{{$video['name']}}</strong>
                        <div class="item-news clearfix item-news-custom" style="padding: 10px 0px; ">
                            {!! $video['videos'] !!}
                        </div>
                    @endforeach

                <div class="tin-tuc-title" style=" padding: 8px 16px; padding-left: 0px">
                    <button type="button" class="btn btn-success" style=" background: #8fcc6d; color: #fff;text-transform: uppercase; font-weight: 500; display: block;border-color: snow; border-radius: 0px;">Phân Bón Doanh Nông</button>
                </div>
                <a href="http://phanbondoanhnong.com.vn/">
                        <img src="/image/banner1.jpg" style="padding-bottom: 20px;width: 100%;">
                    </a>
                    <a href="http://phanbondoanhnong.com.vn/">
                        <img src="/image/banner2.jpg" style="width: 100%;">
                    </a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="footer" style="background: #8fcc6d; width: 100%; float: left; margin-top: 30px;">
        <div class="custom-container" style="padding-top: 5px; padding-bottom: 0px;">
            <div class="blog1" style="width: 85%; float: left; padding: 20px;">
                <img width="275" height="150" src="/image/logo1.png">
                <p style="color: #fff; padding-top: 0px; padding-right: 20px; float: right;">Đơn vị chủ quản: Tập Đoàn Thành Đô<br>
                    Tòa nhà Plaschem, 562 Nguyễn Văn Cừ, Long Biên, Hà Nội<br>
                    Tel: 0243.652.7766 hoặc DĐ: 0913.311.678<br>
                    Chịu trách nhiệm nội dung: Vũ Thanh Khiết<br>
                </p>
            </div>
        </div>
    </div>
</div>
<script>
//  $('a.menu-active').click(function(){
//    $('a.menu-active').removeClass("active");
//    $(this).addClass("active");
//  });

  $(function() {
    var href = window.location.href;
    $('a.menu-active').each(function(e,i) {
      if (href.indexOf($(this).attr('href')) >= 0) {
        $('a.active').removeClass('active');
        $(this).addClass('active');
      }
    });
  });
</script>
</body>
</html>
