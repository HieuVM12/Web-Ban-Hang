@extends('backend.layout.main')

@section('main-content')
    <section class="content-header">
        <h1>
            Chỉnh sửa article <a href="{{route('admin.article.index')}}" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh Sách</a>
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
                        <h3 class="box-title">Thông tin article</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.article.update', ['id' => $article->id ])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề</label>
                                <input value="{{ $article->title }}" type="text" class="form-control" id="title" name="title" placeholder="Nhập tên tiêu đề">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Thay đổi ảnh</label>
                                <input type="file" id="image" name="image">
                                <!-- Hiển thị ảnh cũ -->
                                <br>
                                <img src="{{ asset($article->image) }}" width="250">
                            </div>
                            <div class="form-group">
                                <label>Loại</label>
                                <select class="form-control w-50" name="type">
                                    <option value="1" {{ ($article->type==1) ? 'selected' : '' }}>- Tin tức</option>
                                    <option value="2" {{ ($article->type==2) ? 'selected' : '' }}>- Tin khuyến mại</option>
                                    <option value="3" {{ ($article->type==3) ? 'selected' : '' }}>- Tin nổi bật</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Vị trí</label>
                                <input type="number" class="form-control" id="position" name="position"  value="{{ $article->position }}">
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="1" {{ ($article->is_active == 1) ? 'checked' : '' }} name="is_active"> <b>Hiển thị</b>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Liên kết (url)</label>
                                <input value="{{$article-> url}}" type="text" class="form-control" id="url" name="url" >
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea id="editor2" name="summary" class="form-control" rows="10"  >{{ $article->summary }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="editor1" name="description" class="form-control" rows="15" placeholder="Enter ...">{{ $article->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{$article->meta_title}}">
                            </div>
                            <div class="form-group">
                                <label>Meta Description</label>
                                <textarea id="editor3" name="meta_description" class="form-control" rows="3" >{{$article->meta_description}}</textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
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
            _ckeditor.config.height = 450; // thiết lập chiều cao
            var _ckeditor = CKEDITOR.replace('editor2');
            _ckeditor.config.height = 200; // thiết lập chiều cao
            var _ckeditor = CKEDITOR.replace('editor3');
            _ckeditor.config.height = 100; // thiết lập chiều cao
        })
    </script>
@endsection
