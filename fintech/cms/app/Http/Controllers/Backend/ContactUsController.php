<?php

namespace App\Http\Controllers\Backend;

use App\ContactForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use App\PageKeyValue;
use App\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ContactUsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $overview_texts = PageKeyValue::where('module', 'home')->where('section', 'contactus')->get(['key', 'value'])->toArray();
        $overview_title = NULL;
        $overview_sub_title = NULL;
        $btn_title = NULL;
        $btn_redirect = NULL;
        if(!empty($overview_texts)){
            foreach($overview_texts as $overview_text){
                if($overview_text['key'] == "overview_title") $overview_title = $overview_text['value'];
                elseif($overview_text['key'] == "overview_sub_title") $overview_sub_title = $overview_text['value'];
                elseif($overview_text['key'] == "btn_title") $btn_title = $overview_text['value'];
                elseif($overview_text['key'] == "btn_redirect") $btn_redirect = $overview_text['value'];
            }
        }

        $contactForms = ContactForm::all();

        $data = [
            'overview_title' => $overview_title,
            'overview_sub_title' => $overview_sub_title,
            'btn_title' => $btn_title,
            'btn_redirect' => $btn_redirect,
            'contacts' => $contactForms
        ];
        return view('backend.contactus.index')->with($data);
    }

    public function homeContactUs(Request $request)
    {
        $request->validate([
            'overview_title' => 'max:191',
            'hero_back' => 'sometimes|mimes:jpeg,png,svg|max:5120',
        ]);
        $data = $request->except(['_token', 'hero_back']);
        $insertTitles = PageKeyValue::where('module', 'home')->where('section', 'contactus')->where('key', 'overview_title')->first();
        $title = $data['overview_title'];
        if(!$insertTitles){
            PageKeyValue::create([
                'module' => 'home',
                'section' => 'contactus',
                'key' => 'overview_title',
                'value' => $title
            ]);
        }else{
            $insertTitles->update([
                'module' => 'home',
                'section' => 'contactus',
                'key' => 'overview_title',
                'value' => $title
            ]);
        }
        $insertSubTitles = PageKeyValue::where('module', 'home')->where('section', 'contactus')->where('key', 'overview_sub_title')->first();
        $subTitle = $data['overview_sub_title'];
        if(!$insertSubTitles){
            PageKeyValue::create([
                'module' => 'home',
                'section' => 'contactus',
                'key' => 'overview_sub_title',
                'value' => $subTitle
            ]);
        }else{
            $insertSubTitles->update([
                'module' => 'home',
                'section' => 'contactus',
                'key' => 'overview_sub_title',
                'value' => $subTitle
            ]);
        }
        $insertBtnTitles = PageKeyValue::where('module', 'home')->where('section', 'contactus')->where('key', 'btn_title')->first();
        $btnTitle = $data['btn_title'];
        if(!$insertBtnTitles){
            PageKeyValue::create([
                'module' => 'home',
                'section' => 'contactus',
                'key' => 'btn_title',
                'value' => $btnTitle
            ]);
        }else{
            $insertBtnTitles->update([
                'module' => 'home',
                'section' => 'contactus',
                'key' => 'btn_title',
                'value' => $btnTitle
            ]);
        }
        $insertBtnRedirect = PageKeyValue::where('module', 'home')->where('section', 'contactus')->where('key', 'btn_redirect')->first();
        $btnRedirect = $data['btn_redirect'];
        if(!$insertBtnRedirect){
            PageKeyValue::create([
                'module' => 'home',
                'section' => 'contactus',
                'key' => 'btn_redirect',
                'value' => $btnRedirect
            ]);
        }else{
            $insertBtnRedirect->update([
                'module' => 'home',
                'section' => 'contactus',
                'key' => 'btn_redirect',
                'value' => $btnRedirect
            ]);
        }

        Session::flash('success', 'Updated');

        return back();
    }
}
