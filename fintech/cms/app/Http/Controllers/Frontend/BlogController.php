<?php

namespace App\Http\Controllers\Frontend;

use App\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
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

        $blogs = Blog::where('status', 'Active')->get();

        $data = [
            "blogs" => $blogs
        ];

        return view('frontend.pages.blogs')->with($data);
    }

    public function show(Request $request)
    { 

        $blog = Blog::where('slug', $request->slug)->first();

        $recent_posts = Blog::orderBy('published_at', 'desc')->take(5)->get();

        $data = [
            "blog" => $blog,
            "recent_posts" => $recent_posts
        ];

        return view('frontend.pages.blog')->with($data);
    }
}
