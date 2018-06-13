@extends('admin.layouts.app')
@section('title-content')
    Sửa Tin Nông Nghiệp
@endsection
@section('content')
    <div class="col-md-12">
        <form action="{{route('edit_news_farm')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="news_farm_id" value="{{$newsFarm['id']}}">
            <div class="col-md-8">
                <label>Tên Tin Tức <span style="color: red">(*)</span></label>
                <div class="form-group">
                    <input type="text" name="title_news" class="form-control" placeholder="Nhập tên tin tức..." value="{{$newsFarm['title']}}">
                </div>
                @if ($errors->has('title_news'))
                    <p class="help-block text-left" style="color: red">{{ $errors->first('title_news') }}</p>
                @endif
            </div>

            <div class="col-md-12" style="margin-top: 15px">
                <label>Mô tả về tin tức <span style="color: red">(*)</span></label>
                <textarea id="editor1" name="content_news" rows="7" class="form-control ckeditor">{{$newsFarm['content']}}</textarea>
                <script src="/ckeditor/ckeditor.js"></script>

                <script type="text/javascript">
                  CKEDITOR.replace( 'editor1' );
                </script>
                @if ($errors->has('content_news'))
                    <p class="help-block text-left" style="color: red">{{ $errors->first('content_news') }}</p>
                @endif
            </div>

            <div class=" col-md-8" style="margin-top: 10px">
                <label>Người Viết Bài:</label>
                <div class="form-group">
                    <input type="text" name="author" class="form-control" value="{{$newsFarm['author']}}">
                </div>
                @if ($errors->has('content_author'))
                    <p class="help-block text-left" style="color: red">{{ $errors->first('content_author') }}</p>
                @endif
            </div>

            <div class=" col-md-8" style="margin-top: 10px">
                <label>Hình ảnh đại diện <span style="color: red">(*)</span></label>
                <input type="file" name="fileToUpload">
                <img id="image" src="/upload/{{$newsFarm['image']}}" style="width: 150px; margin-top: 10px">
                @if ($errors->has('fileToUpload'))
                    <p class="help-block text-left" style="color: red">{{ $errors->first('fileToUpload') }}</p>
                @endif
            </div>

            <div class=" col-md-8" style="margin-top: 20px">
                <button type="submit" class="btn btn-primary"> Sửa Tin Tức</button>
            </div>
        </form>
    </div>

@endsection