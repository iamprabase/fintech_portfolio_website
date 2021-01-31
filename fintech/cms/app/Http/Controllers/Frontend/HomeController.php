<?php

namespace App\Http\Controllers\Frontend;

use App\Blog;
use App\HeroSetup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use App\PageKeyValue;
use App\Portfolio;
use App\Service;
use App\Setting;

class HomeController extends Controller
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
        $hero_images = HeroSetup::first();
        $images = Image::all();
        $page_key_values = PageKeyValue::where('module', 'home')->get();

        $featured = $images->where('section', 'featured')->where('active', 1);

        $working_process_title = $page_key_values->where('section', 'overview')->where('key', 'overview_title')->first();
        $working_process_subtitle = $page_key_values->where('section', 'overview')->where('key', 'overview_sub_title')->first();
        $working_process_images = $images->where('section', 'overview')->where('active', 1);

        $service_title = $page_key_values->where('section', 'service')->where('key', 'overview_title')->first();
        $service_sub_title = $page_key_values->where('section', 'service')->where('key', 'overview_sub_title')->first();
        $service_btn_title = $page_key_values->where('section', 'service')->where('key', 'btn_title')->first();
        $service_btn_redirect = $page_key_values->where('section', 'service')->where('key', 'btn_redirect')->first();
        $services = Service::where('set_featured', 1)->pluck('title');
        $service_image = $images->where('section', 'service')->first();

        $funfacts_title = $page_key_values->where('section', 'funfacts')->where('key', 'funfacts_title')->first();
        $funfacts_sub_title = $page_key_values->where('section', 'funfacts')->where('key', 'funfacts_sub_title')->first();
        $funfacts = $page_key_values->where('section', 'funfacts')->whereNotIn('key', ['funfacts_title', 'funfacts_sub_title']);

        $contactus_title = $page_key_values->where('section', 'contactus')->where('key', 'overview_title')->first();
        $contactus_sub_title = $page_key_values->where('section', 'contactus')->where('key', 'overview_sub_title')->first();
        $contactus_btn_title = $page_key_values->where('section', 'contactus')->where('key', 'btn_title')->first();
        $contactus_btn_redirect = $page_key_values->where('section', 'contactus')->where('key', 'btn_redirect')->first();

        $portfolio_title = $page_key_values->where('section', 'portfolio')->where('key', 'overview_title')->first();
        $portfolio_sub_title = $page_key_values->where('section', 'portfolio')->where('key', 'overview_sub_title')->first();
        $portfolios = Portfolio::where('set_featured', 1)->get();

        $info_title = $page_key_values->where('section', 'info')->where('key', 'overview_title')->first();
        $info_sub_title = $page_key_values->where('section', 'info')->where('key', 'overview_sub_title')->first();

        $blogs = Blog::where('status', 'Active')->orderBy('published_at', 'desc')->take(3)->get();

        $account_title = $page_key_values->where('section', 'account')->where('key', 'overview_title')->first();
        $account_sub_title = $page_key_values->where('section', 'account')->where('key', 'overview_sub_title')->first();
        $account_btn_title = $page_key_values->where('section', 'account')->where('key', 'btn_title')->first();
        $account_btn_redirect = $page_key_values->where('section', 'account')->where('key', 'btn_redirect')->first();

        $pageSlider = Image::where('module', 'page-slider')->where('section', 'page-slider')->get();

        $data = [
            'hero_images' => $hero_images,
            'featured' => $featured,
            'working_process_title' => $working_process_title,
            'working_process_subtitle' => $working_process_subtitle,
            'working_process_images' => $working_process_images,
            'service_title' => $service_title,
            'service_sub_title' => $service_sub_title,
            'service_btn_title' => $service_btn_title,
            'service_btn_redirect' => $service_btn_redirect,
            'services' => $services,
            'service_image' => $service_image,
            'funfacts_title' => $funfacts_title,
            'funfacts_sub_title' => $funfacts_sub_title,
            'funfacts' => $funfacts,
            'contactus_title' => $contactus_title,
            'contactus_sub_title' => $contactus_sub_title,
            'contactus_btn_title' => $contactus_btn_title,
            'contactus_btn_redirect' => $contactus_btn_redirect,
            'portfolio_title' => $portfolio_title,
            'portfolio_sub_title' => $portfolio_sub_title,
            'portfolios' => $portfolios,
            'info_title' => $info_title,
            'info_sub_title' => $info_sub_title,
            'account_title' => $account_title,
            'account_sub_title' => $account_sub_title,
            'account_btn_title' => $account_btn_title,
            'account_btn_redirect' => $account_btn_redirect,
            'blogs' => $blogs,
            'pageSlider' => $pageSlider
        ];

        return view('frontend.pages.home')->with($data);
    }
}
