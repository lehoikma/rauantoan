@extends('user.layouts.app')
@section('title')
    {{$newsFarm['title']}}
@endsection
@section('content')
    <div id="vmag-breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#" style="margin-top: 15px">
        <span typeof="v:Breadcrumb">
            <a rel="v:url" property="v:title" href="{{route('home')}}">Trang chủ</a>
        </span> &gt;
        <span class="current">Tin Nông Nghiệp</span>
        &gt;
        <span class="current">{{$newsFarm['title']}}</span>
    </div>
    <div class="page-header1" style="padding-bottom: 9px;">
        <h2 class="page-title" style="font-weight: 400; color: #38A63A">
            {{$newsFarm['title']}}
        </h2>
    </div>
    <span class="posted-on" >
        <span class="glyphicon glyphicon-calendar"></span>
        <a href="" rel="bookmark" style="color: #777;">
            {{ date_format(date_create($newsFarm['created_at']), 'd/m/Y')}}
        </a>
    </span>
    <div class="entry-content" style="padding-top: 20px; border-bottom: 1px solid #777; padding-bottom: 20px">
        {!! $newsFarm['content'] !!}
    </div>
    <div class="red-more">
        <h4 style="padding: 10px 0px;">BÀI CÙNG CHUYÊN MỤC</h4>
        @foreach($newsFarmFollow as $value)
        <div class="single-post" style="float: left;width: 31%;margin: 0 2% 0 0;margin-bottom: 30px;overflow-x: hidden;">
            <div class="post-thumb">
                <a href="{{route('detail_news_farm',['title' => str_slug($value['title'], '-'),'id' => $value['id']])}}">
                    <img style="width: 100%; height: 130px"src="/upload/{{$value['image']}}" alt="" title="Hà Nội: Sợ bão số 4 gây mưa lớn, chung cư – biệt thự “tậu” bao cát chặn hầm chống ngập">
                </a>
            </div>

            <h5 class="small-font">
                <a href="{{route('detail_news_farm',['title' => str_slug($value['title'], '-'),'id' => $value['id']])}}">
                    {{$value['title']}}
                </a>
            </h5>
        </div>
        @endforeach
    </div>
@endsection