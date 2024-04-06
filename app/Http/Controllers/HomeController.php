<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Product;
use App\Deal;
use App\Review;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banners = Banner::all();
        $products = Product::All();
        $proCount =1;
        $cateCount =1;
        $CateParentCount = 1;
        $deals = Deal::all();
        $categories = Category::with('products')->get();
        $topSales = Product::where('pro_sale', 1)->orderBy('updated_at', 'desc')->distinct('cate_id')->get();
        $hots = Product::orderBy('view', 'DESC')->limit(24)->get();;

        return view('home', compact(
            'banners',
            'categories',
            'products',
            'proCount',
            'CateParentCount',
            'topSales',
            'hots',
            'deals',
            'cateCount'
        ));
    }

    public function search(Request $request){
        $cate = Category::all();
        $deals = Deal::all();
        
        $key = $request->get('key');
    
        // Kiểm tra xem có kí tự nhập vào không
        if (!empty($key)) {
            $resultFind = Product::where('pro_name', 'like', '%'.$key.'%')
                ->orWhere('cate_id', 'like', '%'.$key.'%')
                ->orWhere('pro_new_price', '=', "$key")
                ->paginate(12);
        } else {
            // Nếu không có kí tự, không thực hiện truy vấn và set $resultFind là một Collection rỗng
            $resultFind = collect();
        }
    
        return view('user.search', array('key' => $key, 'resultFind' => $resultFind, 'categories' => $cate, 'deals' => $deals));
    }
    
    public function filter(Request $request) {
        $cate = Category::all();
        $star = $request->get('star');
        $min = $request->get('min');
        $max = $request->get('max');
        $ketqua = Product::whereBetween('pro_new_price', ["$min", "$max"])->get();

        $ketqua1 = Review::Where('rate', '<', "$star")->get();

        return view('user.filter', array('ketqua' => $ketqua,'ketqua1' => $ketqua1, 'max' => $max, 'cate' => $cate));
    }

    public function contact()
    {
        return view('about');
    }



    public function indexdemo()
    {
        $banners = Banner::all();
        $products = Product::All();
        $proCount =1;
        $cateCount =1;
        $CateParentCount = 1;
        $deals = Deal::all();
        $categories = Category::with('products')->get();
        $topSales = Product::where('pro_sale', 1)->orderBy('updated_at', 'desc')->distinct('cate_id')->get();
        $hots = Product::orderBy('view', 'desc')->paginate(57);

        return view('homedemo', compact(
            'banners',
            'categories',
            'products',
            'proCount',
            'CateParentCount',
            'topSales',
            'hots',
            'deals',
            'cateCount'
        ));

    }
}
