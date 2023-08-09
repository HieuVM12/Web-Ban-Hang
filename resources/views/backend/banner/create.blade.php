@extends('backend.layout.main')

@section('main-content')
    <section class="content-header">
        <h1>
            Thêm mới Banner <a href="{{route('admin.banner.index')}}" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <div class="col-md-12">
        @if ($errors->any()) <!-- kiểm tra có bất kỳ lỗi nào -->
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Lỗi !</h4>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </div>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-9">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin Banner</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.banner.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề</label>
                                <input value="{{old('title')}}" type="text" class="form-control" id="title" name="title" placeholder="Nhập tên tiêu đề">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ảnh</label>
                                <input type="file" id="image" name="image" src="{{old('image')}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tùy chỉnh liên kết Url</label>
                                <input value="{{old('url')}}" type="text" class="form-control" id="url" name="url" placeholder="Url">
                            </div>
                            <div class="form-group">
                                <label>Target</label>
                                <select class="form-control" name="target">
                                    <option value="1" {{ old('target')== 1 ? 'selected':''}}>_blank</option>
                                    <option value="2" {{ old('target')== 2 ? 'selected':''}}>_self</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại</label>
                                <select class="form-control" name="type">
                                    <option value="1" {{ old('type')== 1 ? 'selected':''}}>slide</option>
                                    <option value="2" {{ old('type')== 2 ? 'selected':''}}>background</option>
                                    <option value="3" {{ old('type')== 3 ? 'selected':''}}>banner right</option>
                                </select>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="1" name="is_active" {{ old('is_active')== 1 ? 'checked':''}}> Trạng thái hiển thị
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Vị trí</label>
                                <input type="number" class="form-control" id="position" name="position" value="{{old('position')}}">
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="editor1" name="description" class="form-control" rows="10" placeholder="Enter ...">{{old('description')}}</textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Tạo</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection

@section('my_js')
    <script type="text/javascript">
        $(function () {
            // setup textarea sử dụng plugin CKeditor
            var _ckeditor = CKEDITOR.replace('editor1');
            _ckeditor.config.height = 500; // thiết lập chiều cao
        })
    </script>
@endsection
