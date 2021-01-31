<?php

namespace App\Http\Controllers\Frontend;

use App\Bod;
use App\Http\Controllers\Controller;

class BodController extends Controller
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
    public function index()
    {

        $boards = Bod::all();

        $data = [
            "bods" => $boards
        ];

        return view('frontend.pages.team')->with($data);
    }
}
