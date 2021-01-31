<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Image;

class EventController extends Controller
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

        $events = Image::where('module', 'events')->where('section', 'gallery')->get();

        $data = [
            "events" => $events
        ];

        return view('frontend.pages.events')->with($data);
    }
}
