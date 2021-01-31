<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use App\PageKeyValue;
use App\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
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
        $overview_texts = PageKeyValue::where('module', 'home')->where('section', 'info')->get(['key', 'value'])->toArray();
        $overview_title = NULL;
        $overview_sub_title = NULL;

        if(!empty($overview_texts)){
            foreach($overview_texts as $overview_text){
                if($overview_text['key'] == "overview_title") $overview_title = $overview_text['value'];
                elseif($overview_text['key'] == "overview_sub_title") $overview_sub_title = $overview_text['value'];
            }
        }

        $data = [
            'overview_title' => $overview_title,
            'overview_sub_title' => $overview_sub_title
        ];
        return view('backend.infos.index')->with($data);
    }

    public function homeInfo(Request $request)
    {
        $request->validate([
            'overview_title' => 'max:191',
            'overview_sub_title' => 'max:191',
        ]);
        $data = $request->except(['_token']);
        $insertTitles = PageKeyValue::where('module', 'home')->where('section', 'info')->where('key', 'overview_title')->first();
        $title = $data['overview_title'];
        if(!$insertTitles){
            PageKeyValue::create([
                'module' => 'home',
                'section' => 'info',
                'key' => 'overview_title',
                'value' => $title
            ]);
        }else{
            $insertTitles->update([
                'module' => 'home',
                'section' => 'info',
                'key' => 'overview_title',
                'value' => $title
            ]);
        }
        $insertSubTitles = PageKeyValue::where('module', 'home')->where('section', 'info')->where('key', 'overview_sub_title')->first();
        $subTitle = $data['overview_sub_title'];
        if(!$insertSubTitles){
            PageKeyValue::create([
                'module' => 'home',
                'section' => 'info',
                'key' => 'overview_sub_title',
                'value' => $subTitle
            ]);
        }else{
            $insertSubTitles->update([
                'module' => 'home',
                'section' => 'info',
                'key' => 'overview_sub_title',
                'value' => $subTitle
            ]);
        }

        Session::flash('success', 'Updated');

        return back();
    }
}
