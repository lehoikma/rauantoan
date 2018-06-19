@extends('user.layouts.app')
@section('title')
    {{$itemProduct['title']}}
@endsection
@section('content')
    <div id="vmag-breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#" style="margin-top: 15px">
        <span typeof="v:Breadcrumb">
            <a rel="v:url" property="v:title" href="{{route('home')}}">Trang chủ</a>
        </span> &gt;
        <span class="current">Sản Phẩm</span>
        &gt;
        <span class="current">{{$itemProduct['title']}}</span>
    </div>
    <div class="page-header1" style="padding-bottom: 9px;">
        <h2 class="page-title" style="font-weight: 400; color: #c0d071">
            {{$itemProduct['title']}}
        </h2>
    </div>
    <span class="posted-on" >
        <span class="glyphicon glyphicon-calendar"></span>
        <a href="" rel="bookmark" style="color: #777;">
            {{date_format(date_create($itemProduct['created_at']), 'm/d/Y')}}
        </a>
    </span>
    <div class="entry-content" style="padding-top: 20px; border-bottom: 1px solid #777; padding-bottom: 20px">
        {!! $itemProduct['content'] !!}
    </div>
    <div class="red-more">
        <h4 style="padding: 10px 0px;">BÀI CÙNG CHUYÊN MỤC</h4>
        @foreach($itemProductFollows as $value)
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 single-post" style="margin-bottom: 30px;overflow-x: hidden;">
            <div class="post-thumb">
                <a href="{{route('detail_news_products',['title' => str_slug($value['title'], '-'),'id' => $value['id']])}}">
                    <img style="width: 100%; height: 300px"src="/upload/{{$value['image']}}" alt="" title="Hà Nội: Sợ bão số 4 gây mưa lớn, chung cư – biệt thự “tậu” bao cát chặn hầm chống ngập">
                </a>
            </div>

            <h5 class="small-font">
                <a href="{{route('detail_news_products',['title' => str_slug($value['title'], '-'),'id' => $value['id']])}}">
                    {{$value['title']}}
                </a>
            </h5>
        </div>
        @endforeach
    </div>
@endsection