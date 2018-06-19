@extends('user.layouts.app')
@section('title-web')
    Đơn Vị Thành Viên
@endsection
@section('content')
    <div class="vmag-breadcrumbs" style="margin-top: 15px">
    <span>
        <a href="/">Trang chủ</a>
    </span> >
        <span>
        Giới Thiệu
    </span> >
        <span class="current">Lịch Sử Hình Thành</span>
    </div>
    <h2 class="page-title" style="font-weight: 400; color: #c0d071;border-bottom: 1px solid #eee;padding-bottom: 10px;">
        Chức Năng, Nhiệm Vụ
    </h2>
    <div class="introduces">
        {!! $introduce['content'] !!}
    </div>
    <div class="col-md-12" style="border-bottom: 1px solid #eee;margin-bottom: 10px;"></div>
@endsection