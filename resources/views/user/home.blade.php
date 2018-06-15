@extends('user.layouts.app')
@section('title')
    Trang Chủ
@endsection
@section('content')
    <div style="width: 100%; float: left">
        <div class="" style="width: 100%">
            <div class="tin-tuc-title" style="border-bottom: 1px solid #d9d8d8; padding: 8px 16px; padding-left: 0px">
                <button type="button" class="btn btn-success" style=" background: #8fcc6d; color: #fff;text-transform: uppercase; font-weight: 500; display: block; border-radius: 0px; border-color: snow">Tin Tức</button>
            </div>
        </div>
        <div style="margin-top: 20px">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="">
                <a href="{{route('news_detail',['title' => str_slug($newsFirst['title'], '-'),'id' => $newsFirst['id']])}}">
                    <img style="width: 100%" src="upload/{{$newsFirst['image']}}" alt="" title="{{$newsFirst['title']}}">
                </a>
                <div class="post-caption-wrapper">
                    <h3 class="large-font">
                        <a href="{{route('news_detail',['title' => str_slug($newsFirst['title'], '-'),'id' => $newsFirst['id']])}}" style="font-size: 18px; color: #333">
                            {{$newsFirst['title']}}
                        </a>
                    </h3>
                    <div class="post-meta clearfix">
                        <span class="posted-on" style="color: #aaaaaa; font-size: 12px">
                                <span class="glyphicon glyphicon-calendar"></span>
                                {{ date_format(date_create($newsFirst['created_at']), 'd/m/Y')}}
                        </span>
                    </div>
                    <div style="margin-top: 10px">{{ strip_tags(substr($newsFirst['content'], 0,150)) }} ...</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item-news-custom" style="padding-left: 20px;">
                @foreach($newsList as $key => $value)
                    @if($key == 0)
                        @continue
                    @else
                        <div class="item-news clearfix" style="padding-bottom: 20px">
                            <div class="post-thumb" style="width: 30%; float: left">
                                <a href="{{route('news_detail',['title' => str_slug($value['title'], '-'),'id' => $value['id']])}}">
                                    <img src="upload/{{$value['image']}}" style="width: 100%">
                                </a>
                            </div>
                            <div class="post-caption clearfix" style="width: 65%; float: left; margin-left: 15px;">
                                <h4 class="small-font" style="font-size: 14px; font-weight: 500; margin-top: 0px;">
                                    <a href="{{route('news_detail',['title' => str_slug($value['title'], '-'),'id' => $value['id']])}}" style="color: #333">
                                        {{$value['title']}}
                                    </a>
                                </h4>
                                <div class="post-meta">
                                <span class="posted-on" style="color: #aaaaaa; font-size: 12px">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                        {{ date_format(date_create($value['created_at']), 'd/m/Y')}}
                                </span>
                                </div>
                            </div><!-- .post-caption -->
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>


    <div style="width: 100%; float: left">
        <div class="" style="width: 100%; margin-top: 30px">
            <div class="tin-tuc-title" style="border-bottom: 1px solid #d9d8d8; padding: 8px 0px;">
                <button type="button" class="btn btn-success" style=" background: #8fcc6d; color: #fff;text-transform: uppercase; font-weight: 500; display: block;border-color: snow; border-radius: 0px;">Tin Doanh Nghiệp</button>
            </div>
        </div>
        @foreach($newsCompany as $key=>$valueNewCompany)
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="margin-top: 20px;">
                <div class="single-post clearfix">
                    <div class="post-thumb">
                        <a class="thumb-zoom" href="{{route('news_detail',['title' => str_slug($valueNewCompany['title'], '-'),'id' => $valueNewCompany['id']])}}">
                            <img style="width: 100%; height: 150px"  src="upload/{{$valueNewCompany['image']}}" alt="" title="{{$valueNewCompany['title']}}">
                            <div class="image-overlay"></div>
                        </a>
                    </div>
                    <h4 style="font-size: 14px; font-weight: 500;" class="small-font;">
                        <a href="{{route('news_detail',['title' => str_slug($valueNewCompany['title'], '-'),'id' => $valueNewCompany['id']])}}" style="color: #333">
                            {{$valueNewCompany['title']}}
                        </a>
                    </h4>
                    <div class="post-meta">
                        <span class="posted-on" style="color: #aaaaaa; font-size: 12px">
                            <span class="glyphicon glyphicon-calendar"></span> {{ date_format(date_create($valueNewCompany['created_at']), 'd/m/Y')}}
                        </span>
                    </div>
                </div>
            </div>
            @if(($key+1)%3 == 0)
                <div class="clearfix"></div>
            @endif
        @endforeach
    </div>
    
    <div style="width: 100%; float: left">
        <div class="" style="width: 100%; margin-top: 30px">
            <div class="tin-tuc-title" style="border-bottom: 1px solid #d9d8d8; padding: 8px 0px;">
                <button type="button" class="btn btn-success" style=" background: #8fcc6d; color: #fff;text-transform: uppercase; font-weight: 500; display: block; border-color: snow; border-radius: 0px;">Tin Nông Nghiệp</button>
            </div>
        </div>
        @foreach($newsFarm as $key => $valueNewsFarm)
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="margin-top: 20px;">
                <div class="single-post clearfix">
                    <div class="post-thumb">
                        <a class="thumb-zoom" href="{{route('news_detail',['title' => str_slug($valueNewsFarm['title'], '-'),'id' => $valueNewsFarm['id']])}}" title="{{$valueNewsFarm['title']}}">
                            <img style="width: 100%; height: 150px" src="upload/{{$valueNewsFarm['image']}}" alt="" title="{{$valueNewsFarm['title']}}">
                            <div class="image-overlay"></div>
                        </a>
                    </div>
                    <h4 style="font-size: 14px; font-weight: 500;" class="small-font;">
                        <a href="{{route('news_detail',['title' => str_slug($valueNewsFarm['title'], '-'),'id' => $valueNewsFarm['id']])}}" style="color: #333">
                            {{$valueNewsFarm['title']}}
                        </a>
                    </h4>
                    <div class="post-meta">
                        <span class="posted-on" style="color: #aaaaaa; font-size: 12px">
                            <span class="glyphicon glyphicon-calendar"></span> {{ date_format(date_create($valueNewsFarm['created_at']), 'd/m/Y')}}
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection