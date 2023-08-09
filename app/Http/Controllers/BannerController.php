<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Banner::all();

        return view('backend.banner.index', ['data' => $data]); // include_once 'file.php'
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:255',
            'image'=>'required'
        ],[
            'title.required'=>'Nhập tiêu đề',
            'title.max'=>'Nhập tối đa 255 kí tự',
            'image.required'=>'Thêm ảnh'
        ]);
        //Khởi tạo Model và gán giá trị từ form cho những thuộc tính của đối tượng (cột trong CSDL)
        $banner = new Banner();
        $banner->title = $request->input('title');
        $banner->slug = str_slug($request->input('title')); // slug

        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName();
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/banner/';
            // Thực hiện upload file
            $file->move($path_upload,$filename);
            // lưu lại đường đẫn file ảnh
            $banner->image = $path_upload.$filename;
        }

        // Url
        $banner->url = $request->input('url');
        // Target
        $banner->target = $request->input('target');
        // Loại
        $banner->type = $request->input('type');
        // Trạng thái
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $banner->is_active = $request->input('is_active');
        }
        else{
            $banner->is_active = 0;
        }
        // Vị trí
        $banner->position = $request->input('position');
        // Mô tả
        $banner->description = $request->input('description');
        // Lưu
        $banner->save();

        // Chuyển hướng trang về trang danh sách
        return redirect()->route('admin.banner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::findorFail($id); // lấy chi tiết banner

        return view('backend.banner.edit', [
            'banner' => $banner
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required|max:255',
        ],[
            'title.required'=>'Nhập tiêu đề',
            'title.max'=>'Nhập tối đa 255 kí tự',
        ]);
        $banner = Banner::findorFail($id);
        $banner->title = $request->input('title');
        $banner->slug = str_slug($request->input('title')); // slug

        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // xóa file cũ
            @unlink(public_path($banner->image)); // hàm unlink của PHP không phải laravel , chúng ta thêm @ đằng trước tránh bị lỗi
            // get image
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/banner/';
            // Thực hiện upload file
            $file->move($path_upload,$filename);

            $banner->image = $path_upload.$filename; // gán giá trị ảnh mới cho thuộc tính image của đối tượng
        }

        // Url
        $banner->url = $request->input('url');
        // Target
        $banner->target = $request->input('target');
        // Loại
        $banner->type = $request->input('type');
        // Trạng thái

        if ($request->has('is_active')) {//kiem tra is_active co ton tai khong?
            $banner->is_active = $request->input('is_active');
        }
        else{
            $banner->is_active = 0;
        }
        // Vị trí
        $banner->position = $request->input('position');
        // Mô tả
        $banner->description = $request->input('description');
        // Lưu
        $banner->save();

        // Chuyển hướng trang về trang danh sách
        return redirect()->route('admin.banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::destroy($id); // DELETE FROM banner WHERE id=15

        // chuyển hướng đến trang
        return redirect()->route('admin.banner.index');
    }
}
