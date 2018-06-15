@extends('user.layouts.app')
@section('title')
    {{$category['name']}}
@endsection
@section('content')
    <div id="vmag-breadcrumbs" style="margin-top: 15px">
        <span typeof="v:Breadcrumb">
            <a rel="v:url" property="v:title" href="{{route('home')}}">Trang chủ</a>
        </span> &gt;
        <span class="current">Tin Tức > {{$category['name']}}</span>
    </div>
    <header class="page-header1" style="padding-bottom: 9px;
    margin: 20px 0 20px;
    border-bottom: 1px solid #eee;">
        <h1 class="page-title" style="font-weight: 400; color: #38A63A">{{$category['name']}}</h1>
    </header>

    @foreach($listNews as $value)
        <div class="post-news" style="border-bottom: 1px solid #e1e1e1;padding-bottom: 20px;margin-bottom: 30px;">

            <div class="entry-thumb">
                <a class="thumb-zoom" href="{{route('news_detail',['title' => str_slug($value['title'], '-'),'id' => $value['id']])}}">
                    <img style="width: 700px; height: 400px" src="/upload/{{$value['image']}}" alt="">
                </a>
            </div>

            <div class="entry-content">
                <h3 class="entry-title">
                    <a href="{{route('news_detail',['title' => str_slug($value['title'], '-'),'id' => $value['id']])}}">
                        {{$value['title']}}
                    </a>
                </h3>
                <div class="entry-meta">
                <span class="posted-on">
                    <a rel="bookmark">
                        <span class="glyphicon glyphicon-calendar"></span><span>
                            {{ date_format(date_create($value['created_at']), 'd/m/Y')}}
                        </span>
                    </a>
                </span>
                </div><!-- .entry-meta -->
                <p style="margin-top: 15px">
                    {{ strip_tags(substr($value['content'], 0,500)) }} ...
                </p>
                <a class="vmag-archive-more" href="{{route('news_detail',['title' => str_slug($value['title'], '-'),'id' => $value['id']])}}">
                    Xem thêm
                </a>
            </div><!-- .entry-content -->
        </div>
    @endforeach
    <div class="pagination-custom">
        <?php echo $listNews->render(); ?>
    </div>
@endsection