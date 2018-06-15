@extends('user.layouts.app')
@section('title')
    Sản Phẩm
@endsection
@section('content')
    <div id="vmag-breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#" style="margin-top: 15px">
        <span typeof="v:Breadcrumb">
            <a rel="v:url" property="v:title" href="{{route('home')}}">Trang chủ</a>
        </span> &gt;
        <span class="current">Sản Phẩm</span>
    </div>
    <header class="page-header1" style="padding-bottom: 9px;
    margin: 20px 0 20px;
    border-bottom: 1px solid #eee;">
        <h1 class="page-title" style="font-weight: 400; color: #38A63A">Sản Phẩm</h1>
    </header>

    <div class="col-xs-12" style="padding-bottom: 15px;padding-right: 0px; padding-left: 0px;">
        @foreach($category as $ctg)
        <div class="mobile-category-product" style="margin-bottom: 10px;background: #f8f8f8;padding: 10px;padding-left: 3px;border-radius: 8px;">
            <span class="glyphicon glyphicon-grain"></span>

            <a href="{{route('list_news_products_category', $ctg['id'])}}">
                <strong style="font-size: 18px;     text-transform: uppercase;">
                    {{$ctg['name']}}
                </strong>
            </a>
        </div>
        @endforeach
    </div>
@endsection