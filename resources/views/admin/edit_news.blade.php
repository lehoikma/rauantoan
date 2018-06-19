@extends('admin.layouts.app')
@section('title-content')
    Sửa Tin Tức
@endsection
@section('content')
    <div class="col-md-12">
        <form action="{{route('edit_news')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="news_id" value="{{$news['id']}}">
            <div class="col-md-8">
                <label>Tên Tin Tức <span style="color: red">(*)</span></label>
                <div class="form-group">
                    <input type="text" name="title_news" class="form-control" placeholder="Nhập tên tin tức ..." value="{{$news['title']}}">
                </div>
                @if ($errors->has('title_news'))
                    <p class="help-block text-left" style="color: red">{{ $errors->first('title_news') }}</p>
                @endif
            </div>

            <div class="col-md-8">
                <label>Danh Mục Tin Tức:</label>
                <select class="form-control" id="sel1" name="select_cate_news">
                    <option value=""></option>
                    @foreach($categoryNews as $value)
                        <?php var_dump($news['category_news_id']); ?>
                        <option value="{{$value['id']}}" {{ $value['id']==$news['category_news_id'] ? 'selected' : ''}}>{{$value['name']}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12" style="margin-top: 15px">
                <label>Mô tả về tin tức <span style="color: red">(*)</span></label>
                <textarea id="editor1" name="content_news" rows="7" class="form-control ckeditor">{{$news['content']}}</textarea>
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
                    <input type="text" name="author" class="form-control" value="{{$news['author']}}">
                </div>
                @if ($errors->has('content_author'))
                    <p class="help-block text-left" style="color: red">{{ $errors->first('content_author') }}</p>
                @endif
            </div>

            <div class=" col-md-8" style="margin-top: 10px">
                <label>Hình ảnh đại diện <span style="color: red">(*)</span></label>
                <input type="file" name="fileToUpload">
                <img id="image" src="/upload/{{$news['image']}}" style="width: 150px; margin-top: 10px">
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