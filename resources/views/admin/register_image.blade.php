@extends('admin.layouts.app')
@section('title-content')
    Tạo Hình Ảnh
@endsection
@section('content')
    <div class="col-md-12">
        <form action="{{route('save_register_image')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="col-md-8">
                <label>Danh Mục Hình Ảnh:<span style="color: red">(*)</span></label>
                <select class="form-control" id="sel1" name="select_cate_image">
                    <option value=""></option>
                    @foreach($categoriesImages as $value)
                        <option value="{{$value['id']}}" {{(old('select_cate_image') == $value['id'] ? 'selected': '')}}>{{$value['name']}}</option>
                    @endforeach
                </select>
                @if ($errors->has('select_cate_image'))
                    <p class="help-block text-left" style="color: red">{{ $errors->first('select_cate_image') }}</p>
                @endif
            </div>
            <div class=" col-md-8" style="margin-top: 10px">
                <label>Hình ảnh<span style="color: red">(*)</span></label>
                <input type="file" name="fileToUpload">
                @if ($errors->has('fileToUpload'))
                    <p class="help-block text-left" style="color: red">{{ $errors->first('fileToUpload') }}</p>
                @endif
            </div>
            <div class=" col-md-8" style="margin-top: 10px">
                <label>Chú Thích Hình Ảnh</label>
                <input type="text" name="description" class="form-control">
            </div>

            <div class=" col-md-8" style="margin-top: 20px">
                <button type="submit" class="btn btn-primary"> Tạo Hình Ảnh</button>
            </div>
        </form>
    </div>

@endsection