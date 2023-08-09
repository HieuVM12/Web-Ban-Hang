<?php

namespace App\Http\Controllers;
use Session;
use App\Brand;
use App\Article;
use App\Banner;
use App\Category;
use App\Contact;
use App\Product;
use App\Cart;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class ShopController extends Controller
{
    protected $categories;
    public function __construct()
    {
        $this->categories = Category::where('is_active', 1)
            ->orderBy('position', 'asc')
            ->get();
        $articles = Article::where('is_active',1)->orderBy('id', 'desc')
            ->orderBy('position', 'asc')
            ->limit(4)
            ->get();
        $brands = Brand::where('is_active',1)->orderBy('id', 'desc')
            ->orderBy('position', 'asc')
            ->limit(6)
            ->get();

        // chia sẻ dữ liệu qua nhiêù trang khác nhau
        view()->share([
            'categories' => $this->categories,
            'articles' =>$articles,
            'brands' => $brands
        ]);
    }

    public function index(Request $request)
    {
        // 1. Lấy dữ liệu - Banner
        $banners = Banner::where('is_active', 1)->orderBy('id', 'desc')
            ->orderBy('position', 'asc')
            ->take(4)->get();
        //2 . chứa tên danh mục cha và sản phẩm theo danh mục (gồm cả SP thuộc cha và con)
        $data = [];

        foreach ($this->categories as $category) {
            if ($category->parent_id == 0) { // lấy danh mục cha

                $categoryIds = []; // biến chưa id của danh mục , cha / con

                $categoryIds[] = $category->id;
                foreach ($this->categories as $categoryChild1) {
                    if ($categoryChild1->parent_id == $category->id) {
                        $categoryIds[] = $categoryChild1->id;

                        foreach ($this->categories as $categoryChild2) {
                            if ($categoryChild2->parent_id == $categoryChild1->id) {
                                $categoryIds[] = $categoryChild2->id;
                            }
                        }
                    }
                }

                // SQL query dữ liệu sản phẩm của cả cha/con
                $products = Product::where(['is_active' => 1])
                    ->whereIn('category_id' , $categoryIds)
                    ->limit(10)
                    ->orderBy('id', 'desc')
                    ->orderBy('position', 'asc')
                    ->get();


                $data[] = [
                    'name' => $category->name,
                    'products' => $products ,// toàn bộ sản phẩm gồm cả cha / con
                ];
            }
        }

        /*echo '<pre>';
        dd($data);
        die;*/
        return view('frontend.index', [
            'banners' => $banners,
            'data' => $data
        ]);
    }

    // danh mục sản phẩm
    public function category($slug)
    {
        $cate =  Category::where(['slug' => $slug])->first();


        //2 . chứa tên danh mục cha và sản phẩm theo danh mục (gồm cả SP thuộc cha và con)
        $data = [];

        foreach ($this->categories as $category) {
            if ($category->id == $cate->id ) { // lấy danh mục cha

                $categoryIds = []; // biến chưa id của danh mục , cha / con

                $categoryIds[] = $category->id;

                foreach ($this->categories as $categoryChild1) {
                    if ($categoryChild1->parent_id == $category->id) {
                        $categoryIds[] = $categoryChild1->id;

                        foreach ($this->categories as $categoryChild2) {
                            if ($categoryChild2->parent_id == $categoryChild1->id) {
                                $categoryIds[] = $categoryChild2->id;
                            }
                        }
                    }
                }

                // SQL query dữ liệu sản phẩm của cả cha/con
                $products = Product::where('is_active',1)
                    ->whereIn('category_id' , $categoryIds)
//                    ->limit(10)
                    ->orderBy('id', 'desc')
                    ->orderBy('position', 'asc')
                    ->paginate(20);


                $data = [
                    'name' => $category->name,
                    'products' => $products ,// toàn bộ sản phẩm gồm cả cha / con
                ];


            }
        }

        return view('frontend.category',['data' => $data]);
    }

    // chi tiết sản phẩm
    public function product($slug)
    {
        $product = Product::where(['slug'=>$slug]) -> first();

        // bước 1  : lưu lại thông tin sản phảm đã xem vào cookie
        // lưu id sẩn phẩm đã xem lần đầu vào cookie
        if (isset($_COOKIE['list_product_viewed'])) {
            // xử lý lưu thêm vào danh sách tiếp theo
            $list_products_viewed = $_COOKIE['list_product_viewed']; // list id sản phẩm , nhưng đag là 1 chuỗi
            $list_products_viewed = json_decode($list_products_viewed); // chuyển chuỗi list id=> mảng

            $list_products_viewed[] = $product->id;

            // danh sách bị thay đổi => nạp lại giá trị cho key
            $string_list_id = json_encode($list_products_viewed);
            setcookie('list_product_viewed', $string_list_id , time() + (3600));

        } else {
            $arr_viewed_product = [$product->id];
            $arr_viewed_product = json_encode($arr_viewed_product); // { "ten" : "gia tri"  }
            setcookie('list_product_viewed', $arr_viewed_product , time() + (3600));
        }

        // bước 2:  lấy ra chi tiết thông tin những sản phẩm đã xem ,từ cookie
        if (!empty($_COOKIE['list_product_viewed'])) {
            $products_viewed =  $_COOKIE['list_product_viewed'];
            $array_products_viewed = json_decode($products_viewed); // [48,48,56,46,89,10,12]

            $array_products_viewed = array_unique($array_products_viewed); // [48,56,46,89,10,12]

            $array_products_viewed = array_slice($array_products_viewed, -5, 5);


            // lấy ra danh sách sách sản phẩm đã xem từ mảng : $list_products_viewed
            $viewedProducts = Product::where([
                                            ['is_active' , '=', 1],
                                            ['id' ,'<>' , $product->id]
                                        ])->whereIn('id' , $array_products_viewed)
                                        ->get();
        }
        else{
            $viewedProducts=[];
        }
        return view('frontend.product',[
            'product' => $product,
            'viewedProducts' => $viewedProducts,
        ]);
    }

    public function listProduct(){
        return view('frontend.listProduct');
    }

    // Trang liên hệ
    public function contact()
    {
        return view('frontend.contact');
    }

    // trang đặt hàng
    public function order()
    {
        return view('frontend.order');
    }

    // dANH SACH TIN Tức
    public function articles()
    {
        $articless = Article::where('is_active',1)->orderBy('id', 'desc')
            ->orderBy('position', 'asc')
            ->paginate(20);


        return view('frontend.article',[
            'articless'=>$articless
        ]);
    }

    // chi tiết tin tức
    public function detailArticle($slug)
    {
        $article = Article::where(['slug'=> $slug]) ->where('is_active',1) -> first();

        return view('frontend.detailArticle',[
            'article' => $article
        ]);
    }

    public function postContact(Request $request)
    {
        //validate dữ liệu gửi từ form
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'content' => 'required'
        ], [
            'name.required' => 'Nhập họ tên',
            'name.max' => 'Nhập họ tên tối đa 255 ký tự',
            'email.email' => 'Nhập đúng định dạng email',
            'email.required' => ' Nhập email ',
            'phone.required' => ' Nhập SĐT',
            'content.required' => ' Nhập nội dung'
        ]);

        //luu vào csdl
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->phone = $request->input('phone');
        $contact->email = $request->input('email');
        $contact->content = $request->input('content');
        $contact->save();

        // chuyển về trang chủ
        return redirect('/');
    }
    public function search(Request $request)
    {
        $key = $request->input('tu-khoa');

        $products = Product::where([
            ['name', 'like', '%' . $key . '%'],
            ['is_active', '=', 1]
        ])->paginate(20);


        return view('frontend.search', [
            'products' => $products
        ]);
    }

    public function AddCart(Request $req,$id){
        $product = Product::where(['id'=> $id])->first();
        if($product != null){
            $oldCart = Session('Cart') ? Session('Cart') : null ;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product, $id);
            $req->session()->put('Cart' ,$newCart);

        }
        return view('frontend.cart');
    }
    public function DeleteItemCart(Request $req,$id){
        $oldCart = Session('Cart') ? Session('Cart') : null ;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if(Count($newCart->products)>0){
            $req->Session()->put('Cart',$newCart);
        }
        else{
            $req->Session()->forget('Cart');
        } 
        return view('frontend.cart');
    }

    public function ViewListCart(){
        return view('frontend.listCart');
    }
    public function DeleteItemListCart(Request $req,$id){
        $oldCart = Session('Cart') ? Session('Cart') : null ;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if(Count($newCart->products)>0){
            $req->Session()->put('Cart',$newCart);
        }
        else{
            $req->Session()->forget('Cart');
        } 
        return view('frontend.list-cart');
    }
} 