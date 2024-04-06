<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Review;
use App\Order;
use App\Deal;
use App\proChillImage;
use Symfony\Component\Console\Input\Input;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $deals=Deal::all();

        if($request->has('search')){
            $search = $request->input('search');
            $products = Product::where('pro_name', 'like', '%'.$search.'%')->paginate(10);
            $countModal = 1;

            return view('product.view', compact('products', 'countModal'));
        }
        $products = Product::with('category')->latest()->paginate(10);
        $countModal = 1;

        return view('product.view', compact('products', 'countModal'));
    }

      public function search(Request $request)
    {
        $deals=Deal::all();

        if($request->has('search')){
            $search = $request->input('search');
            $products = Product::search($search)->paginate(10);
            $countModal = 1;

            return view('product.view', compact('products', 'countModal'));
        }
        $products = Product::with('category')->latest()->paginate(10);
        $countModal = 1;

        return view('product.view', compact('products', 'countModal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('pro_image');
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $file->move('images/products', $fileName);
        $product = new Product();
        $product->pro_name = $request->input('pro_name');
        $product->cate_id = $request->input('cate_id');
        $product->pro_desc = $request->input('pro_desc');
        $product->pro_image = $fileName;
        $product->quantity = $request->input('quantity');
        $product->pro_old_price = $request->input('pro_old_price');
        $product->pro_new_price = $request->input('pro_new_price');
        $product->pro_sale = $request->input('pro_sale');
        $product->save();

        foreach($request->file('chill_image') as $fileChill)
        {
            $nameChill = uniqid() . '_' . $fileChill->getClientOriginalName();;
            $fileChill->move('images/chillImageProducts', $nameChill);
            $chillImage = new proChillImage();
            $chillImage->pro_id = $product->pro_id;
            $chillImage->chill_image = $nameChill;
            $chillImage->save();
        }

        return redirect()->route('admin.product.index')->with('add_success', trans('admin.message.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::all();
        $product = Product::findOrFail($id);
        $product->increment('view');
        $productOrderSame = Product::inRandomOrder()->limit(3)->get();
        $countReview = 1;
        $categories=Category::all();
       

        return view('product.product-detail', compact('product', 'products', 'productOrderSame', 'countReview','categories'));
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
        $pro = Product::findOrFail($id);

        return view('product.edit', compact('pro', 'categories'));
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
        $pro = Product::findOrFail($id);
        $file = $request->file('pro_image');
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $file->move('images/products', $fileName);
        $pro->pro_name = $request->input('pro_name');
        $pro->cate_id = $request->input('cate_id');
        $pro->pro_desc = $request->input('pro_desc');
        $pro->pro_image = $fileName;
        $pro->quantity = $request->input('quantity');
        $pro->pro_old_price = $request->input('pro_old_price');
        $pro->pro_new_price = $request->input('pro_new_price');
        $pro->pro_sale = $request->input('pro_sale');
        $pro->save();

        foreach($request->file('chill_image') as $fileChill)
        {
            $nameChill = uniqid() . '_' . $fileChill->getClientOriginalName();;
            $fileChill->move('images/chillImageProducts', $nameChill);
            $chillImage = new proChillImage();
            $chillImage->pro_id = $id;
            $chillImage->chill_image = $nameChill;
            $chillImage->save();
        }

        return redirect()->route('admin.product.index')->with('update_success', trans('admin.message.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro = Product::findOrFail($id);
        $pro->proChillImages()->delete();
        $pro->reviews()->delete();
        $pro->wishlists()->delete();
        $pro->delete();

        return redirect()->route('admin.product.index')->with('del_success', trans('admin.message.del_success'));
    }

    public function showAll(Request $request)
    {
         $deals=Deal::all();
        $filter = $request->input('filter');
        if($request->has('min_pri') && $request->has('max_pri')){
            $min = $request->input('min_pri');
            $max = $request->input('max_pri');
            $categories = Category::all();
            $products = Product::pricebetween($min,$max)->paginate(12);
            return view('product.showAllProduct', compact('categories', 'products','filter','deals'));
        }
       
        switch ($filter)
        {
            case 'newest':
                $categories = Category::all();
                $products = Product::newest()->paginate(12);
                return view('product.showAllProduct', compact('categories', 'products','filter','deals'));
            break;
            case 'viewest':
                $categories = Category::all();
                $products = Product::viewest()->paginate(12);
                return view('product.showAllProduct', compact('categories', 'products','filter','deals'));
            break;
            case 'best_discount':
                $categories = Category::all();
                $products = Product::viewest()->paginate(12);
                return view('product.showAllProduct', compact('categories', 'products','filter','deals'));
            break;
            case 'saling':
                $categories = Category::all();
                $products = Product::saling()->paginate(12);
                return view('product.showAllProduct', compact('categories', 'products','filter','deals'));
            break;
            case 'saling':
                $categories = Category::all();
                $products = Product::saling()->paginate(12);
                return view('product.showAllProduct', compact('categories', 'products','filter','deals'));
            break;
            case 'Ascending':
                $categories = Category::all();
                $products = Product::ascending()->paginate(12);
                return view('product.showAllProduct', compact('categories', 'products','filter','deals'));
            break;
            case 'Decrease':
                $categories = Category::all();
                $products = Product::decrease()->paginate(12);
                return view('product.showAllProduct', compact('categories', 'products','filter','deals'));
            break;
            default:
                $categories = Category::all();
                $products = Product::nameproduct($filter)->paginate(12);
                return view('product.showAllProduct', compact('categories', 'products','filter','deals'));
            break;
        };
        $categories = Category::all();
        $products = Product::paginate(12);

        return view('product.showAllProduct', compact('categories', 'products','deals'));
    }
}
