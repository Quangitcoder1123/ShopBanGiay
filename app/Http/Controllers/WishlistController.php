<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Wishlist;
use App\Category;

class WishlistController extends Controller
{
    public function save_wishlist(Request $request)
    {
        Wishlist::create([
            'user_id' => Auth::user()->user_id,
            'pro_id' => $request->input('pro_id'),
        ]);

        return redirect()->back();
    }
    public function show_wishlist($id)
    {
        $wish = User::findOrFail($id);
         $categories=Category::all();
        // $wish = Wishlist::with('product')
        //   ->where('user_id', $user->id)
        //   ->orderby('id', 'desc')
        //   ->paginate(10);
        return view('product.wishlish', compact('wish','categories'));
    }

    public function delete_wishlist($id)
    {
        $wish = Wishlist::findOrFail($id);
        $wish->delete();

        return redirect()->back();
    }
}
