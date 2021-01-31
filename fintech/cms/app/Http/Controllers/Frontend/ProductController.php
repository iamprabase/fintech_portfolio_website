<?php

namespace App\Http\Controllers\Frontend;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PageKeyValue;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function show(Product $product){
        $page_key_values = PageKeyValue::where('module', 'home')->get();
        $account_title = $page_key_values->where('section', 'account')->where('key', 'overview_title')->first();
        $account_sub_title = $page_key_values->where('section', 'account')->where('key', 'overview_sub_title')->first();
        $account_btn_title = $page_key_values->where('section', 'account')->where('key', 'btn_title')->first();
        $account_btn_redirect = $page_key_values->where('section', 'account')->where('key', 'btn_redirect')->first();

        return view('frontend.pages.product')->with([
            'product' => $product,
            'account_title' => $account_title,
            'account_sub_title' => $account_sub_title,
            'account_btn_title' => $account_btn_title,
            'account_btn_redirect' => $account_btn_redirect,
        ]);
    }
}
