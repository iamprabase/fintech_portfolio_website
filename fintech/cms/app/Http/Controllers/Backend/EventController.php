<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
        return view('backend.events.index')->with($data);
    }

    public function store(Request $request) {
        $data = $request->except(['_token', 'row_num']);
        $rows = $request->row_num;

        if($request->row_id)  $current_images = Image::where('module', 'events')->where('section', 'gallery')->whereNotIn('id', $request->row_id)->get();
        else $current_images = collect();

        DB::beginTransaction();
        if(!empty($rows)){
            foreach($rows as $row){
                $insertData = array('module' => 'events', 'section' => 'gallery');

                if(array_key_exists('featured_image', $data)){
                    if(isset($data['featured_image'][$row])){
                        $image = $data['featured_image'][$row];
                        if ($image->isValid()) {
                            $extension = $image->extension();
                            if(in_array($extension, ['jpeg', 'png', 'jpg', 'gif', 'svg'])){
                                $name = time()."_".rand(1000, 9999);
                                $image->storeAs('/public/backend', $name.".".$extension);
                                $url = Storage::url('backend/'.$name.".".$extension);
                                $insertData ['image'] = $url;
                                
                                if(isset($data['row_id'][$row])){
                                    $current_uri = Image::find($data['row_id'][$row])->image;
                                    if(file_exists(public_path($current_uri))){
                                        unlink(public_path($current_uri));
                                    }
                                }
                            }else{
                                Session::flash('error', 'The featured Image '. $row .' must be jpeg, png, jpg, gif, svg.');
                                return back();
                            }
                        }
                    }else{
                        if(isset($data['row_id'][$row])){
                            $insertData['image'] = Image::find($data['row_id'][$row])->image;
                        }else{
                            Session::flash('error', 'The featured Image is required field.');
                            return back();
                        }
                    }
                }else{
                    if(isset($data['row_id'][$row])){
                        $insertData['image'] = Image::find($data['row_id'][$row])->image;
                    }else{
                        Session::flash('error', 'The featured Image is required field.');
                        return back();
                    }
                }

                $insertData ['title'] = $data['title'][$row];
                if(!isset($data['row_id'][$row])){
                    Image::create( $insertData);
                }else{
                    Image::updateOrCreate( [
                        'id' => $data['row_id'][$row],
                    ], $insertData);
                }
            }
        }else{
            $current_images = Image::where('module', 'home')->where('section', 'featured')->get();
        }
        if($current_images->first()){
            foreach($current_images as $current_image){
                $current_path = $current_image->image;
                if(file_exists(public_path($current_path))){
                    unlink(public_path($current_path));
                }
                Image::where('id', $current_image->id)->delete();
            }
        }

        DB::commit();
        Session::flash('success', 'Updated');

        return back();
    }
}
