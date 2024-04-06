<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Deal;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $search = $request->input('search');
            $categories = Category::search($search)->paginate(10);

            return view('category.view', compact('categories'));
        }
        $categories = Category::whereNull('parent_id')->with('children')->paginate(10);

        return view('category.view', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();

        return view('category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileLogo = $request->file('cate_logo');
        $fileNameLogo = uniqid() . '_' . $fileLogo->getClientOriginalName();
        $fileLogo->move('images/categories/logos', $fileNameLogo);
        $fileImage = $request->file('cate_image');
        $fileNameImage = uniqid() . '_' . $fileImage->getClientOriginalName();
        $fileImage->move('images/categories/images', $fileNameImage);
        Category::create([
            'cate_name' => $request->input('cate_name'),
            'cate_desc' => $request->input('cate_desc'),
            'cate_logo' => $fileNameLogo,
            'cate_image' => $fileNameImage,
            'parent_id' => $request->input('parent_id'),
        ]);

        return redirect()->route('admin.category.index')->with('add_success', trans('admin.message.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cateId, Request $request)
    {
        $deals=Deal::all();
         $filter = $request->input('filter');
        if ($request->has('min_pri') && $request->has('max_pri')) {
            $min = $request->input('min_pri');
            $max = $request->input('max_pri');
            $categories = Category::all();
            $cate = Category::findOrFail($cateId);
            $products = Product::where('cate_id', $cateId)->pricebetween($min, $max)->paginate(12);
            return view('category.show', compact('cate', 'categories', 'products','deals','filter'));
        }
        $filter = $request->input('filter');
        switch ($filter) {
            case 'newest':
                $categories = Category::all();
                $products = Product::where('cate_id', $cateId)->newest()->paginate(12);
                $cate = Category::findOrFail($cateId);
                return view('category.show', compact('cate', 'categories', 'products','deals','filter'));
            break;
            case 'viewest':
                $categories = Category::all();
                $products = Product::where('cate_id', $cateId)->viewest()->paginate(12);
                $cate = Category::findOrFail($cateId);
                return view('category.show', compact('cate', 'categories', 'products','deals','filter'));
            break;
            case 'best_discount':
                $categories = Category::all();
                $products = Product::where('cate_id', $cateId)->viewest()->paginate(12);
                $cate = Category::findOrFail($cateId);
                return view('category.show', compact('cate', 'categories', 'products','deals','filter'));
            break;
            case 'saling':
                $categories = Category::all();
                $products = Product::where('cate_id', $cateId)->saling()->paginate(12);
                $cate = Category::findOrFail($cateId);
                return view('category.show', compact('cate', 'categories', 'products','deals','filter'));
            break;
            case 'Ascending':
                $categories = Category::all();
                $products = Product::where('cate_id', $cateId)->ascending()->paginate(12);
                $cate = Category::findOrFail($cateId);
                return view('category.show', compact('cate', 'categories', 'products','deals','filter'));
            break;
            case 'Decrease':
                $categories = Category::all();
                $products = Product::where('cate_id', $cateId)->decrease()->paginate(12);
                $cate = Category::findOrFail($cateId);
                return view('category.show', compact('cate', 'categories', 'products','deals','filter'));
            break;
            default:
                $categories = Category::all();
                $products = Product::where('cate_id', $cateId)->nameproduct($filter)->paginate(12);
                $cate = Category::findOrFail($cateId);
                return view('category.show', compact('cate', 'categories', 'products','deals','filter'));
            break;
        };
        $categories = Category::all();
        $cate = Category::findOrFail($cateId);
        $products = Product::where('cate_id', $cateId)->paginate(12);

        return view('category.show', compact('cate', 'categories', 'products','deals','filter'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($cateId)
    {
        $cate = Category::findOrFail($cateId);
        $categories = Category::whereNull('parent_id')->get();

        return view('category.edit', compact('cate', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cateId)
    {
        $cate = Category::findOrFail($cateId);

        $fileLogo = $request->file('cate_logo');
        $fileNameLogo = uniqid() . '_' . $fileLogo->getClientOriginalName();
        $fileLogo->move('images/categories/logos', $fileNameLogo);
        $fileImage = $request->file('cate_image');
        $fileNameImage = uniqid() . '_' . $fileImage->getClientOriginalName();
        $fileImage->move('images/categories/images', $fileNameImage);

        $cate->cate_name = $request->input('cate_name');
        $cate->cate_desc = $request->input('cate_desc');
        $cate->cate_image = $fileNameImage;
        $cate->cate_logo = $fileNameLogo;
        $cate->parent_id = $request->input('parent_id');
        $cate->save();

        return redirect()->route('admin.category.index')->with('update_success', trans('admin.message.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cateId)
    {
        $cate = Category::findOrFail($cateId);
        if($cate->parent_id == null){
            $cate->children()->delete();
            $cate->products()->delete();
            $cate->delete();
        }

        return redirect()->route('admin.category.index')->with('del_success', trans('admin.message.del_success'));
    }
}
