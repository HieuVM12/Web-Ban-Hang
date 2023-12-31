@extends('backend.layout.main')

@section('main-content')
    <style>.w-50 { width: 50% }</style>
    <section class="content-header">
        <h1>
            Thêm mới tin tức <a href="{{route('admin.article.index')}}" class="btn btn-success "><i
                    class="fa fa-list"></i> Danh Sách TT</a>
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
            <div class="col-md-9 col-lg-9">


                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin bài viết</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.article.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề</label>
                                <input value="{{old('title')}}" type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ảnh</label>
                                <input type="file" class="" id="image" name="image">
                            </div>
                            <div class="form-group">
                                <label>Loại</label>
                                <select class="form-control w-50" name="type">
                                    <option value="1" {{ old('type') == 1 ? 'selected' : ''}}>- Tin tức</option>
                                    <option value="2" {{ old('type') == 2 ? 'selected' : ''}}>- Tin khuyến mại</option>
                                    <option value="3" {{ old('type') == 3 ? 'selected' : ''}}>- Tin nổi bật</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Vị trí</label>
                                <input type="number" class="form-control w-50" id="position" name="position" value="{{old('position')}}">
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="1" name="is_active" {{ old('is_active') == 1 ? 'checked' : ''}}> <b>Hiển thị</b>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Liên kết (url)</label>
                                <input type="text" class="form-control" id="url" name="url" placeholder="" value="{{old('url')}}">
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea id="editor2" name="summary" class="form-control" rows="10" >{{old('summary')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="editor1" name="description" class="form-control" rows="10" >{{old('description')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{old('meta_title')}}" >
                            </div>
                            <div class="form-group">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="3" >{{old('meta_description')}}</textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Tạo</button>
                            <input type="reset" class="btn btn-default pull-right" value="Reset">
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            </form>
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
            var _ckeditor = CKEDITOR.replace('editor2');
            _ckeditor.config.height = 200; // thiết lập chiều cao
        })
    </script>
@endsection
