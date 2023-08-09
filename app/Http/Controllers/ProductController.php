<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::paginate(20);

        //$data = Product::latest()->paginate(20); // lấy dữ liệu phân trang


        return view('backend.product.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('backend.product.create', ['categories' => $categories, 'brands' => $brands]);
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
            'name' => 'required|max:255',
            'image' => 'required|mimes:jpg,png',
            'stock' => 'required',
            'price' =>'required',
            'sale' => 'required',
            'category_id' =>'required|not_in:0',
            'brand_id' =>'required|not_in:0'
        ],[
            'name.required' => 'Nhập tên sản phẩm',
            'name.max' => 'Nhập tối đa 255 kí tự',
            'image.required'=>'Thêm ảnh',
            'image.mimes' => 'File ảnh phải có dạng jpg,png',
            'stock.required' => 'Nhập số lượng sản phẩm',
            'price.required' => 'Nhập giá bán sản phẩm',
            'sale.required' => 'Nhập giá khuyến mại sản phẩm',
            'category_id.not_in' => 'Chọn danh mục sản phẩm',
            'brand_id.not_in' => 'Chọn thương hiệu sản phẩm'
        ]);
        // lấy toàn bộ tham số gửi từ form
        $params = $request->all(); // $_POST , $_GET

        $product = new Product(); // khởi tạo model
        $product->name = $params['name'];// $_POST['name'];
        $product->slug = str_slug($request->input('name'));
        $product->is_active = isset($params['is_active']) ? $params['is_active'] : 0;
        $product->is_hot = isset($params['is_hot']) ? $params['is_hot'] : 0;
        // Upload file
        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/product/';
            // Thực hiện upload file
            $file->move($path_upload,$filename); // upload lên thư mục public/uploads/product

            $product->image = $path_upload.$filename;
        }

        $product->stock = $request->input('stock'); // số lượng
        $product->price = $request->input('price'); // giá bán
        $product->sale = $request->input('sale'); // giá khuyến mại
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->position = $request->input('position');
        $product->url = $request->input('url');

        //kiem tra is_active co ton tai khong
        if ($request->has('is_active')){
            $product->is_active = $request->input('is_active') ? $request->input('is_active') : 0;
        }

        // Sản phẩm Hot
        if ($request->has('is_hot')){
            $product->is_hot = $request->input('is_hot') ? $request->input('is_hot') : 0;
        }

        $product->summary = $request->input('summary');
        $product->description = $request->input('description');
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->save();

        // chuyển hướng đến trang
        return redirect()->route('admin.product.index');
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
        $categories = Category::all();
        $brands = Brand::all();

        $product = Product::findOrFail($id); // select * from where id =43

        return view('backend.product.edit', ['product' => $product,'categories' => $categories, 'brands' => $brands]);
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
            'name' => 'required|max:255',
            'image' => 'mimes:jpg,png',
            'stock' => 'required',
            'price' =>'required',
            'sale' => 'required',
            'category_id' =>'required|not_in:0',
            'brand_id' =>'required|not_in:0'
        ],[
            'name.required' => 'Nhập tên sản phẩm',
            'name.max' => 'Nhập tối đa 255 kí tự',
            'image.mimes'=> 'File ảnh phải có dạng jpg,png',
            'stock.required' => 'Nhập số lượng sản phẩm',
            'price.required' => 'Nhập giá bán sản phẩm',
            'sale.required' => 'Nhập giá khuyến mại sản phẩm',
            'category_id.not_in' => 'Chọn danh mục sản phẩm',
            'brand_id.not_in' => 'Chọn thương hiệu sản phẩm'
        ]);
        // lấy toàn bộ tham số gửi từ form
        $params = $request->all(); // $_POST , $_GET

        $product = Product::findOrFail($id); // khởi tạo model
        $product->name = $params['name']; // $_POST['name'];;
        $product->slug = str_slug($request->input('name'));
        $product->is_active = isset($params['is_active']) ? $params['is_active'] : 0;
        $product->is_hot = isset($params['is_hot']) ? $params['is_hot'] : 0;
        // Upload file
        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/product/';
            // Thực hiện upload file
            $file->move($path_upload,$filename); // upload lên thư mục public/uploads/product

            $product->image = $path_upload.$filename;
        }

        $product->stock = $request->input('stock'); // số lượng
        $product->price = $request->input('price'); // giá bán
        $product->sale = $request->input('sale'); // giá khuyến mại
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->position = $request->input('position');
        $product->url = $request->input('url');

        //kiem tra is_active co ton tai khong
        if ($request->has('is_active')){
            $product->is_active = $request->input('is_active') ? $request->input('is_active') : 0;
        }

        // Sản phẩm Hot
        if ($request->has('is_hot')){
            $product->is_hot = $request->input('is_hot') ? $request->input('is_hot') : 0;
        }

        $product->summary = $request->input('summary');
        $product->description = $request->input('description');
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->save();

        // chuyển hướng đến trang
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id); // DELETE FROM brands WHERE id=15

        // chuyển hướng đến trang
        return redirect()->route('admin.product.index');
    }
}
