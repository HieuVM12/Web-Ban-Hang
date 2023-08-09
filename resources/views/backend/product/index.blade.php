@extends('backend.layout.main')

@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản Lý Sản Phẩm <a href="{{ route('admin.product.create') }}" class="btn btn-success">Tạo</a>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh Sách</h3>

                        <div class="box-tools">
                            <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Avatar</th>
                                <th>Danh Mục</th>
                                <th>Thương hiệu</th>
                                <th>Vị trí</th>
                                <th>Sản phẩm hot</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th style="width: 120px">Hành động</th>
                            </tr>
                            @if(!empty($data))
                                @foreach($data as $key => $row)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>
                                            <img width="120" src="{{ asset($row->image) }}" alt="">
                                        </td>
                                        <td>{{ $row->category->name }}</td>
                                        <td> {{$row->brand->name}}</td>
                                        <td>{{ $row->position }}</td>
                                        <td>{{$row-> is_hot}}</td>
                                        <td>{{ ($row->is_active == 1) ? 'Hiển thị' : 'Ẩn' }}</td>
                                        <td>{{ $row->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.product.edit' , ['id' => $row->id ]) }}" class="btn btn-primary">Sửa</a>

                                            <form style="display: inline-block;" action="{{ route('admin.product.destroy', ['id' => $row->id ]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {{ $data->links() }}
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
