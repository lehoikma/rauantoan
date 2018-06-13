@extends('admin.layouts.app')
@section('title-content')
    Tạo Videos
@endsection
@section('content')
    <div class="col-md-12">
        <form action="{{route('save_register_videos')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="col-md-8">
                <div class="form-group">
                    <label>Tên Video : <span style="color: red">(*)</span></label>
                    <input type="text" name="name_videos" class="form-control" placeholder="Nhập tên Video" value="{{old('name_videos')}}">
                </div>
                @if ($errors->has('name_videos'))
                    <p class="help-block text-left" style="color: red">{{ $errors->first('name_videos') }}</p>
                @endif
            </div>
            <div class="col-md-12" style="margin-top: 15px">
                <label>Nhúng link youtube vào : <span style="color: red">(*)</span></label>
                <textarea id="editor1" name="content_videos" rows="7" class="form-control ckeditor">{{old('content_videos')}}</textarea>
                <script src="/ckeditor/ckeditor.js"></script>

                <script type="text/javascript">
                  CKEDITOR.replace( 'editor1' );
                </script>
                @if ($errors->has('content_videos'))
                    <p class="help-block text-left" style="color: red">{{ $errors->first('content_videos') }}</p>
                @endif
            </div>

            <div class=" col-md-8" style="margin-top: 20px">
                <button type="submit" class="btn btn-primary"> Tạo Videos</button>
            </div>
        </form>
    </div>

@endsection