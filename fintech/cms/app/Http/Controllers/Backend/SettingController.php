<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Support\Facades\Session;
use Storage;

class SettingController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $setting = Setting::first();

        $data = [
            'setting' => $setting
        ];

        return view('backend.settings.index')->with($data);
    }

    public function store(Request $request){

        $request->validate([
            'site_title' => 'required',
            'location' => 'required',
            'email' =>'required|email',
            'phone' => 'required',
            // 'fax' => 'required',
            'site-icon' => 'sometimes|max:3072',
            'site-logo' => 'sometimes|mimes:jpeg,png|max:3072',
            'site-logo-2' => 'sometimes|mimes:jpeg,png|max:3072',
        ]);

        $data = $request->except(['_token', 'site-icon', 'site-logo', 'site-logo-2']);

        if ($request->hasFile('site-icon')) {
            //  Let's do everything here
            if ($request->file('site-icon')->isValid()) {
                $image = $request->file('site-icon');
                $extension = $image->extension();
                $name = time()."_".rand(1000, 9999);
                $image->storeAs('/public/backend', $name.".".$extension);
                $url = Storage::url('backend/'.$name.".".$extension);
                $data ['site_icon'] = $url;
            }
        }
        if ($request->hasFile('site-logo')) {
            //  Let's do everything here
            if ($request->file('site-logo')->isValid()) {
                $image = $request->file('site-logo');
                $extension = $image->extension();
                $name = time()."_".rand(1000, 9999);
                $image->storeAs('/public/backend', $name.".".$extension);
                $url = Storage::url('backend/'.$name.".".$extension);
                $data ['site_logo'] = $url;
            }
        }
        if ($request->hasFile('site-logo-2')) {
            //  Let's do everything here
            if ($request->file('site-logo-2')->isValid()) {
                $image = $request->file('site-logo-2');
                $extension = $image->extension();
                $name = time()."_".rand(1000, 9999);
                $image->storeAs('/public/backend', $name.".".$extension);
                $url = Storage::url('backend/'.$name.".".$extension);
                $data ['site_logo_responsive'] = $url;
            }
        }

        $setting_exists = Setting::first();

        if($setting_exists){
            $store = $setting_exists->update($data);
        }else{
            $store = Setting::create($data);
        }
        Session::flash('success', 'Updated');

        return back();

    }
}
