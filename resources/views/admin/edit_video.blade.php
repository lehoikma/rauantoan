@extends('admin.layouts.app')
@section('title-content')
    Sửa Videos
@endsection
@section('content')
    <div class="col-md-12">
        <form action="{{route('save_edit_videos')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="id_video" value="{{$video['id']}}">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Tên Video : <span style="color: red">(*)</span></label>
                    <input type="text" name="name_videos" class="form-control" placeholder="Nhập tên Video" value="{{$video['name']}}">
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 15px">
                <label>Nhúng link youtube vào : <span style="color: red">(*)</span></label>
                <textarea id="editor1" name="content_videos" rows="7" class="form-control ckeditor">{{$video['videos']}}</textarea>
                <script src="/ckeditor/ckeditor.js"></script>

                <script type="text/javascript">
                  CKEDITOR.replace( 'editor1' );
                </script>
            </div>

            <div class=" col-md-8" style="margin-top: 20px">
                <button type="submit" class="btn btn-primary"> Sửa Videos</button>
            </div>
        </form>
    </div>

@endsection