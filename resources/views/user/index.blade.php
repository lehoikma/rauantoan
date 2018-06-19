@extends('user.layouts.app')
@section('title-web')
    Giới Thiệu
@endsection
@section('content')
        <div class="vmag-breadcrumbs" style="margin-top: 15px">
        <span>
            <a href="/">Trang chủ</a>
        </span> >
            <span class="current">Giới Thiệu</span>
        </div>
        <header class="page-header1" style="padding-bottom: 9px;
            margin: 20px 0 20px;
            border-bottom: 1px solid #eee;">
            <h1 class="page-title" style="font-weight: 400; color: #38A63A">Giới Thiệu</h1>
        </header>
        <div class="introduces">
            <ul style="list-style: none;padding-left: 0px;">
                <li style="margin-bottom: 10px;background: #f6f6f6;padding: 10px;border-radius: 8px;">
                    <h4>
                        <a href="{{route('introduce1')}}">Lịch sử Hình Thành</a>
                    </h4>
                </li>
                <li style="margin-bottom: 10px;background: #f6f6f6;padding: 10px;border-radius: 8px;">
                    <h4>
                        <a href="{{route('introduce2')}}">Cơ Cấu Tổ Chức</a>
                    </h4>
                </li>
                <li style="margin-bottom: 10px;background: #f6f6f6;padding: 10px;border-radius: 8px;">
                    <h4>
                        <a href="{{route('introduce3')}}">Chức Năng, Nhiệm Vụ</a>
                    </h4>
                </li>
            </ul>
        </div>
        <div class="col-md-12" style="border-bottom: 1px solid #eee;margin-bottom: 10px;"></div>
@endsection