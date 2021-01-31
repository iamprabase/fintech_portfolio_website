<?php

namespace App\Http\Controllers\Frontend;

use App\About;
use App\ContactForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PageKeyValue;

class AboutUsController extends Controller
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

        $page_key_values = PageKeyValue::where('module', 'home')->get();
        $account_title = $page_key_values->where('section', 'account')->where('key', 'overview_title')->first();
        $account_sub_title = $page_key_values->where('section', 'account')->where('key', 'overview_sub_title')->first();
        $account_btn_title = $page_key_values->where('section', 'account')->where('key', 'btn_title')->first();
        $account_btn_redirect = $page_key_values->where('section', 'account')->where('key', 'btn_redirect')->first();

        $abouts = About::all();

        $profile = $abouts->where('section', 'aboutus')->first();
        $mission = $abouts->where('section', 'mission')->first();
        $vision = $abouts->where('section', 'vision')->first();
        $goals = $abouts->where('section', 'goals')->first();
        $values = $abouts->where('section', 'values')->first();

        $data = [
            'profile' => $profile,
            'mission' => $mission,
            'vision' => $vision,
            'goals' => $goals,
            'values' => $values,
            'account_title' => $account_title,
            'account_sub_title' => $account_sub_title,
            'account_btn_title' => $account_btn_title,
            'account_btn_redirect' => $account_btn_redirect,
        ];
        return view('frontend.pages.aboutus')->with($data);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:191',
            'email' => 'required|email',
            'msg_subject' => 'required|max:191',
            'message' => 'required'
        ]);

        $create = ContactForm::create($request->except('_token'));
        // Session::flash('success', 'Submission Success');

        // return redirect()->back();
        if($create) return response()->json([
            'status' => 200
        ]);
        else return response()->json([
            'status' => 400
        ]);
    }

    public function components(){
        return view('frontend.pages.aboutuscomponent');
    }
}
