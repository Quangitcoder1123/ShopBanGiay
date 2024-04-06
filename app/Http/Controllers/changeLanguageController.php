<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class changeLanguageController extends Controller
{
    public function changeLanguage($language) //gọi controller
    {
        \Session::put('lang', $language); 

        return redirect()->back(); //trả về view
    }
}
