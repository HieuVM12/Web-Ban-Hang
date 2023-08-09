@extends('backend.layout.main')

@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm Danh Mục <a href="{{ route('admin.category.index') }}" class="btn btn-success">Danh Sách</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
        </ol>
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

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên</label>
                                <input value="{{old('name')}}" name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập Tên">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Logo</label>
                                <input {{old('image')}} name="image" type="file" id="exampleInputFile">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Danh Mục Cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">0</option>
                                    @foreach($data as $item)
                                            <option value="{{ $item->id }}" {{old('parent_id')==$item->id?'selected':''}}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Vị trí</label>
                                <input name="position" type="number" class="form-control" id="exampleInputEmail1" min="1" value="{{old('position')}}">
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="is_active" value="1" {{old('is_active')==1?'checked':''}}> Hiển thị
                                </label>
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
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
