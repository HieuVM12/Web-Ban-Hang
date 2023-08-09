<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Article::all();
        return view('backend.article.index',[ 'data' => $data ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Article::all();
        return view('backend.article.create');
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
            'title.required'=>'Thêm tiêu đề tin tức',
            'title.max'=>'Nhập tối đa 255 kí tự',
            'image.required'=>'Thêm ảnh'
        ]);
        $article = new Article(); // khởi tạo model
        $article->title = $request->input('title');
        $article->slug = str_slug($request->input('title'));

        // Upload file
        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/article/';
            // Thực hiện upload file
            $file->move($path_upload,$filename); // upload lên thư mục public/uploads/article

            $article->image = $path_upload.$filename;
        }

        $article->type = $request->input('type');
        $article->position = $request->input('position');
        // Trạng thái
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $article->is_active = $request->input('is_active');
        }
        else {
            $article->is_active= 0;
        }
        $article->url = $request->input('url'); // số lượng
        $article->summary = $request->input('summary');
        $article->description = $request->input('description');
        $article->meta_title = $request->input('meta_title');
        $article->meta_description = $request->input('meta_description');
        $article->save();

        // chuyển hướng đến trang
        return redirect()->route('admin.article.index');
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
        //
        $article = Article::findorFail($id); // lấy chi tiết banner

        return view('backend.article.edit', ['article' => $article]);
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
            'title.required'=>'Thêm tiêu đề tin tức',
            'title.max'=>'Nhập tối đa 255 kí tự',
        ]);
        $article = Article::findorFail($id);
        $article->title = $request->input('title');
        $article->slug = str_slug($request->input('title'));

        // Upload file
        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/article/';
            // Thực hiện upload file
            $file->move($path_upload,$filename); // upload lên thư mục public/uploads/article

            $article->image = $path_upload.$filename;
        }

        $article->type = $request->input('type');
        $article->position = $request->input('position');
        // Trạng thái
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $article->is_active = $request->input('is_active');
        }
        else {
            $article->is_active= 0;
        }
        $article->url = $request->input('url'); // số lượng
        $article->summary = $request->input('summary');
        $article->description = $request->input('description');
        $article->meta_title = $request->input('meta_title');
        $article->meta_description = $request->input('meta_description');
        $article->save();

        // chuyển hướng đến trang
        return redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::destroy($id); // DELETE FROM brands WHERE id=15

                // chuyển hướng đến trang
                return redirect()->route('admin.article.index');
    }
}
