<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Hiện thị danh sách
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::all();
        return view('backend.category.index', [ 'data' => $data ]);
    }

    /**
     * Hiện thị form thêm dữ liệu
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::all(); // lấy toàn bộ danh mục => build option Danh Mục Cha
        return view('backend.category.create', [ 'data' => $data ]);
    }

    /**
     * Sau khi nhấn submit form tạo, xử lý lưu dữ liệu ở đây
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|max:255',
            'image'=>'required'
        ],[
            'name.required'=> 'Nhập tên danh mục',
            'name.max'=>'Nhập tối đa 255 kí tự',
            'image.required'=>'Thêm ảnh'
        ]);
        // lấy toàn bộ tham số gửi từ form
        $params = $request->all(); // $_POST , $_GET

        // INSERT thêm vào CSDL
        $category = new Category(); // category brand sử dụng cơ chế ORM => tự động mapping vs table brand
        $category->name = $params['name'];
        $category->slug = str_slug($params['name']); // đồng hồ =>  dong-ho
        $category->parent_id = isset($params['parent_id']) ? $params['parent_id'] : 0;
        $category->position = $params['position'];
        $category->is_active = isset($params['is_active']) ? $params['is_active'] : 0;

        // xử lý lưu ảnh
        if ($request->hasFile('image')) { // kiểm tra xem có file gửi lên không
            // get file được gửi lên
            $file = $request->file('image');
            // đặt lại tên cho file
            $filename = $file->getClientOriginalName();  // $file->getClientOriginalName() = lấy tên gốc của file
            // duong dan upload
            $path_upload = 'uploads/categories/';
            // upload file
            $file->move($path_upload,$filename);

            $category->image = $path_upload.$filename;
        }

        $category->save(); // insert mysql : INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')

        // chuyển hướng đến trang
        return redirect()->route('admin.category.index');
    }

    /**
     * hiển thị chi tiết 1 thông tin dữ liệu cho 1 bản ghi
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Hiển thị chi tết dữ liệu, nhưng dữ liệu được đặt trong 1 form
     * Để người dùng có thể chỉnh lại thông tin
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // lấy chi tiết
        $data = Category::find($id); // SELECT * FROM category WHERE id  = 5
        $list = Category::all(); // lấy toàn bộ danh mục => build option Danh Mục Cha

        return view('backend.category.edit', ['data' => $data, 'list' => $list] );
    }

    /**
     * Sau khi nhấn submit form edit  , thì nhận dữ liệu và xử lý lưu lại từ form edit
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> 'required|max:255',
        ],[
            'name.required'=> 'Nhập tên danh mục',
            'name.max'=>'Nhập tối đa 255 kí tự',
        ]);
        // lấy toàn bộ tham số gửi từ form
        $params = $request->all(); // $_POST , $_GET

        $category = Category::find($id); // lấy  ra đối tượng cần sửa
        $category->name = $params['name'];
        $category->slug = str_slug($params['name']); // đồng hồ =>  dong-ho
        $category->parent_id = $params['parent_id'];
        $category->position = $params['position'];
        $category->is_active = isset($params['is_active']) ? $params['is_active'] : 0;
        // xử lý lưu ảnh
        if ($request->hasFile('image')) { // kiểm tra xem có file gửi lên không
            // get file được gửi lên
            $file = $request->file('image');
            // đặt lại tên cho file
            $filename = $file->getClientOriginalName();  // $file->getClientOriginalName() = lấy tên gốc của file
            // duong dan upload
            $path_upload = 'uploads/categories/';
            // upload file
            $file->move($path_upload,$filename);
            // lưu lại đường dẫn ảnh upload
            $category->image = $path_upload.$filename;
        }

        $category->save(); // lưu mysql : UPDATE

        // chuyển hướng đến trang
        return redirect()->route('admin.category.index');
    }

    /**
     * xóa 1 bản ghi dữ liệu
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id); // DELETE FROM brands WHERE id=15

        // chuyển hướng đến trang
        return redirect()->route('admin.category.index');
    }
}
