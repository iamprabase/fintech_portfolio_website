<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use App\PageKeyValue;
use App\Service;
use App\ServiceSection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
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
     * Show the application home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $overview_texts = PageKeyValue::where('module', 'home')->where('section', 'service')->get(['key', 'value'])->toArray();
        $overview_title = NULL;
        $overview_sub_title = NULL;

        if(!empty($overview_texts)){
            foreach($overview_texts as $overview_text){
                if($overview_text['key'] == "overview_title") $overview_title = $overview_text['value'];
                elseif($overview_text['key'] == "overview_sub_title") $overview_sub_title = $overview_text['value'];
            }
        }

        $services = Service::all();
        $servicesection = ServiceSection::all();

        $data = [
            'overview_title' => $overview_title,
            'overview_sub_title' => $overview_sub_title,
            'services' => $services,
            'servicesection' => $servicesection
        ];
        return view('frontend.pages.services')->with($data);
    }

}
