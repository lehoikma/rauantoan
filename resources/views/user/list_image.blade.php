@extends('user.layouts.app')
@section('title')
    Danh Sách Hình Ảnh
@endsection
@section('content')
    <div id="vmag-breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#" style="margin-top: 15px">
        <span typeof="v:Breadcrumb">
            <a rel="v:url" property="v:title" href="{{route('home')}}">Trang chủ</a>
        </span> &gt;
        <span class="current">Hình Ảnh</span>
    </div>
    <header class="page-header1" style="padding-bottom: 9px;
    margin: 20px 0 20px;
    border-bottom: 1px solid #eee;">
        <h1 class="page-title" style="font-weight: 400; color: #c0d071">Hình Ảnh Hoạt Động Của Công Ty</h1>
    </header>

    @foreach($categoryImage as $category)
                <!--<h3>{{$category['name']}}</h3>-->
        <div class="image" style="text-align: center">
        @foreach($listImage as $image)
            @if($category['id'] == $image['category_image_id'])
                 <img src="upload/{{$image['image']}}" style="width: 50%; margin-bottom: 20px;">
                 </br>
                 @if(isset($image['description']))
                        <i>{{$image['description']}}</i>
                    @endif
            @endif
        @endforeach
        </div>
    @endforeach
@endsection