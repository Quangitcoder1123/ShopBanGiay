<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;
use Illuminate\Http\Request;
use Session;
use App\Category;

class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        $pro_id = $request->input('pro_id');
        $quantity = $request->input('quantity');
        $getpro = Product::find($pro_id);
        $pro_name = $getpro->pro_name;
        $pro_image = $getpro->pro_image;
        $pro_new_price = $getpro->pro_new_price;

        $data = [
            'id' => $pro_id,
            'qty' => $quantity,
            'name' => $pro_name,
            'price' => $pro_new_price,
            'weight' => '12',
            'options' => [
                'image' => $pro_image,
            ],
        ];
        Cart::add($data);

        return redirect()->back();
    }

    public function show_cart()
    {
          $categories=Category::all();
        return view('cart.view',compact('categories'));
    }

    public function delete_cart($rowId)
    {
        Cart::remove($rowId);

        return redirect()->back();
    }

    public function update_quantity(Request $request, $rowId)
    {
        Cart::update($rowId, $request->input('update_qty'));

        return redirect()->back();
    }
}
