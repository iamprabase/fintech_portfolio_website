<?php

namespace App\Http\Controllers\Frontend;

use App\ContactForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ContactUsController extends Controller
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

        return view('frontend.pages.contact');
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
}
