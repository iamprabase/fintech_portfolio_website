<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HeroSetup;
use App\Image;
use App\PageKeyValue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
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
        $hero = HeroSetup::first();
        $featured = Image::where('module', 'home')->where('section', 'featured')->get();
        $overview = Image::where('module', 'home')->where('section', 'overview')->get();
        $overview_texts = PageKeyValue::where('module', 'home')->where('section', 'overview')->get(['key', 'value'])->toArray();
        $overview_title = NULL;
        $overview_sub_title = NULL;
        if(!empty($overview_texts)){
            foreach($overview_texts as $overview_text){
                if($overview_text['key'] == "overview_title") $overview_title = $overview_text['value'];
                else $overview_sub_title = $overview_text['value'];
            }
        }

        $funfacts_texts = PageKeyValue::where('module', 'home')->where('section', 'funfacts')->whereIn('key', ['funfacts_title', 'funfacts_sub_title'])->get(['key', 'value'])->toArray();
        $funfacts_title = NULL;
        $funfacts_sub_title = NULL;
        if(!empty($funfacts_texts)){
            foreach($funfacts_texts as $funfacts_text){
                if($funfacts_text['key'] == "funfacts_title") $funfacts_title = $funfacts_text['value'];
                else $funfacts_sub_title = $funfacts_text['value'];
            }
        }

        $funfacts = PageKeyValue::where('module', 'home')->where('section', 'funfacts')->whereNotIn('key', ['funfacts_title', 'funfacts_sub_title'])->get(['key', 'value', 'id']);

        $account_texts = PageKeyValue::where('module', 'home')->where('section', 'account')->get(['key', 'value'])->toArray();
        $account_overview_title = NULL;
        $account_overview_sub_title = NULL;
        $account_btn_title = NULL;
        $account_btn_redirect = NULL;
        if(!empty($account_texts)){
            foreach($account_texts as $overview_text){
                if($overview_text['key'] == "overview_title") $account_overview_title = $overview_text['value'];
                elseif($overview_text['key'] == "overview_sub_title") $account_overview_sub_title = $overview_text['value'];
                elseif($overview_text['key'] == "btn_title") $account_btn_title = $overview_text['value'];
                elseif($overview_text['key'] == "btn_redirect") $account_btn_redirect = $overview_text['value'];
            }
        }

        $data = [
            'hero' => $hero,
            'featured' => $featured,
            'overview' => $overview,
            'overview_title' => $overview_title,
            'overview_sub_title' => $overview_sub_title,
            'funfacts' => $funfacts,
            'funfacts_title' => $funfacts_title,
            'funfacts_sub_title' => $funfacts_sub_title,
            'account_overview_title' => $account_overview_title,
            'account_overview_sub_title' => $account_overview_sub_title,
            'account_btn_title' => $account_btn_title,
            'account_btn_redirect' => $account_btn_redirect,
        ];
        return view('backend.home.index')->with($data);
    }

    public function heroSetup(Request $request)
    {
        $request->validate([
            'hero_title' => 'required',
            'hero_back' => 'sometimes|mimes:jpeg,png,svg|max:5120',
            'hero_front' => 'sometimes|mimes:jpeg,png,svg|max:5120',
        ]);
        $data = $request->except(['_token', 'hero_back', 'hero_front']);
        $hero_exists = HeroSetup::first();

        DB::beginTransaction();
        if ($request->hasFile('hero_back')) {
            if($hero_exists){
                if(file_exists(public_path($hero_exists->hero_back)) && $hero_exists->hero_back){
                    unlink(public_path($hero_exists->hero_back));
                    $data ['hero_back'] = NULL;
                }
            }

            if ($request->file('hero_back')->isValid()) {
                $image = $request->file('hero_back');
                $extension = $image->extension();
                $name = time()."_".rand(1000, 9999);
                $image->storeAs('/public/backend', $name.".".$extension);
                $url = Storage::url('backend/'.$name.".".$extension);
                $data ['hero_back'] = $url;
            }
        }
        if ($request->hasFile('hero_front')) {
            if($hero_exists){
                if(file_exists(public_path($hero_exists->hero_front)) && $hero_exists->hero_front){
                    unlink(public_path($hero_exists->hero_front));
                    $data ['hero_front'] = NULL;
                }
            }

            if ($request->file('hero_front')->isValid()) {
                $image = $request->file('hero_front');
                $extension = $image->extension();
                $name = time()."_".rand(1000, 9999);
                $image->storeAs('/public/backend', $name.".".$extension);
                $url = Storage::url('backend/'.$name.".".$extension);
                $data ['hero_front'] = $url;
            }
        }

        if($hero_exists){
            $store = $hero_exists->update($data);
        }else{
            $store = HeroSetup::create($data);

        }
        DB::commit();

        Session::flash('success', 'Updated');

        return back();
    }

    public function featuredSetup(Request $request)
    {
        $data = $request->except(['_token', 'row_num']);
        $rows = $request->row_num;

        if($request->row_id)  $current_images = Image::where('module', 'home')->where('section', 'featured')->whereNotIn('id', $request->row_id)->get();
        else $current_images = collect();

        DB::beginTransaction();
        if(!empty($rows)){
            foreach($rows as $row){
                $insertData = array('module' => 'home', 'section' => 'featured');
                $insertData['title'] = $data['featured_title'][$row];
                $insertData['active'] = NULL;
                if(array_key_exists('active', $data)){
                    // if(isset($data['active'][$row]))
                    $insertData['active'] = array_key_exists($row, $data['active'])?$data['active'][$row]:NULL;
                }

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
                if(!isset($data['row_id'][$row])){
                    Image::create( $insertData);
                }else{
                    if(array_key_exists('active', $data)){
                        if(!array_key_exists($row, $data['active'])) $insertData['active'] = Image::find($data['row_id'][$row])->active;
                        Image::updateOrCreate( [
                            'id' => $data['row_id'][$row],
                        ], $insertData);
                        
                    }
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

    public function overviewSetup(Request $request)
    {
        $data = $request->except(['_token', 'row_num']);
        $rows = $request->row_num;

        $title = $data['overview_title'];
        $sub_title = $data['overview_sub_title'];

        if($request->row_id) $current_images = Image::where('module', 'home')->where('section', 'overview')->whereNotIn('id', $request->row_id)->get();
        else $current_images = collect();
        DB::beginTransaction();
        $insertTitles = PageKeyValue::where('module', 'home')->where('section', 'overview')->where('key', 'overview_title')->first();
        if(!$insertTitles){
            PageKeyValue::create([
                'module' => 'home',
                'section' => 'overview',
                'key' => 'overview_title',
                'value' => $title
            ]);
        }else{
            $insertTitles->update([
                'module' => 'home',
                'section' => 'overview',
                'key' => 'overview_title',
                'value' => $title
            ]);
        }
        $insertSubTitles = PageKeyValue::where('module', 'home')->where('section', 'overview')->where('key', 'overview_sub_title')->first();
        if(!$insertSubTitles){
            PageKeyValue::create([
                'module' => 'home',
                'section' => 'overview',
                'key' => 'overview_sub_title',
                'value' => $sub_title
            ]);
        }else{
            $insertSubTitles->update([
                'module' => 'home',
                'section' => 'overview',
                'key' => 'overview_sub_title',
                'value' => $sub_title
            ]);
        }
        if(!empty($rows)){
            foreach($rows as $row){
                $insertData = array('module' => 'home', 'section' => 'overview');
                $insertData['title'] = $data['icon_title'][$row];
                $insertData['sub_title'] = $data['icon_sub_title'][$row];
                $insertData['active'] = NULL;

                if(array_key_exists('active', $data)){
                    if(isset($data['active'][$row])) $insertData['active'] = array_key_exists($row, $data['active'])?$data['active'][$row]:NULL;
                }

                if(array_key_exists('overview_image', $data)){
                    if(isset($data['overview_image'][$row])){
                        $image = $data['overview_image'][$row];
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
                                Session::flash('error', 'The overview Image '. $row .' must be jpeg, png, jpg, gif, svg.');

                                return back();

                            }
                        }
                    }else{
                         if(isset($data['row_id'][$row])){
                            $insertData['image'] = Image::find($data['row_id'][$row])->image;
                        }else{
                            Session::flash('error', 'The overview Image is required field.');
                            return back();
                        }
                    }
                }else{
                    if(isset($data['row_id'][$row])){
                        $insertData['image'] = Image::find($data['row_id'][$row])->image;
                    }else{
                        Session::flash('error', 'The overview Image is required field.');
                        return back();
                    }
                }

                if(!isset($data['row_id'][$row])){
                    Image::create( $insertData);
                }else{
                  if(array_key_exists('active', $data)){
                    if(!array_key_exists($row, $data['active'])) $insertData['active'] = Image::find($data['row_id'][$row])->active;
                  }

                    Image::updateOrCreate( [
                        'id' => $data['row_id'][$row],
                    ], $insertData);
                }
            }
        }else{
            $current_images = Image::where('module', 'home')->where('section', 'overview')->get();
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

    public function funFactsSetup(Request $request)
    {
        $data = $request->except(['_token']);
        $rows = $request->row_num;

        $title = $data['funfacts_title'];
        $sub_title = $data['funfacts_sub_title'];

        DB::beginTransaction();
        $insertTitles = PageKeyValue::where('module', 'home')->where('section', 'funfacts')->where('key', 'funfacts_title')->first();
        if(!$insertTitles){
            PageKeyValue::create([
                'module' => 'home',
                'section' => 'funfacts',
                'key' => 'funfacts_title',
                'value' => $title
            ]);
        }else{
            $insertTitles->update([
                'module' => 'home',
                'section' => 'funfacts',
                'key' => 'funfacts_title',
                'value' => $title
            ]);
        }
        $insertSubTitles = PageKeyValue::where('module', 'home')->where('section', 'funfacts')->where('key', 'funfacts_sub_title')->first();
        if(!$insertSubTitles){
            PageKeyValue::create([
                'module' => 'home',
                'section' => 'funfacts',
                'key' => 'funfacts_sub_title',
                'value' => $sub_title
            ]);
        }else{
            $insertSubTitles->update([
                'module' => 'home',
                'section' => 'funfacts',
                'key' => 'funfacts_sub_title',
                'value' => $sub_title
            ]);
        }

        if(!empty($rows)){
            if(!array_key_exists('row_id', $data)) $data['row_id'] = array();
            foreach($rows as $row){
                $insertData = array('module' => 'home', 'section' => 'funfacts');
                $title = $data['icon_title'][$row];
                $sub_title = $data['icon_sub_title'][$row];
                $insertData['key'] = $title;
                $insertData['value'] = $sub_title;
                if(isset($data['row_id'][$row])){
                    PageKeyValue::where('module', 'home')->where('section', 'funfacts')->where('id', $data['row_id'][$row])->update($insertData);
                }else{
                    $created = PageKeyValue::create($insertData);
                    if(array_key_exists('row_id', $data)) array_push($data['row_id'], $created->id);
                }
            }
        }

        if(isset($data['row_id'])){
            PageKeyValue::where('module', 'home')->where('section', 'funfacts')->whereNotIn('key', ['funfacts_title', 'funfacts_sub_title'])->whereNotIn('id', $data['row_id'])->delete();
        }else{
            PageKeyValue::where('module', 'home')->where('section', 'funfacts')->whereNotIn('key', ['funfacts_title', 'funfacts_sub_title'])->delete();
        }

        DB::commit();
        Session::flash('success', 'Updated');

        return back();
    }

    public function accountSetup(Request $request)
    {
        $request->validate([
            'overview_title' => 'max:191',
            'hero_back' => 'sometimes|mimes:jpeg,png,svg|max:5120',
        ]);
        $data = $request->except(['_token', 'hero_back']);
        $insertTitles = PageKeyValue::where('module', 'home')->where('section', 'account')->where('key', 'overview_title')->first();
        $title = $data['overview_title'];
        if(!$insertTitles){
            PageKeyValue::create([
                'module' => 'home',
                'section' => 'account',
                'key' => 'overview_title',
                'value' => $title
            ]);
        }else{
            $insertTitles->update([
                'module' => 'home',
                'section' => 'account',
                'key' => 'overview_title',
                'value' => $title
            ]);
        }
        $insertSubTitles = PageKeyValue::where('module', 'home')->where('section', 'account')->where('key', 'overview_sub_title')->first();
        $subTitle = $data['overview_sub_title'];
        if(!$insertSubTitles){
            PageKeyValue::create([
                'module' => 'home',
                'section' => 'account',
                'key' => 'overview_sub_title',
                'value' => $subTitle
            ]);
        }else{
            $insertSubTitles->update([
                'module' => 'home',
                'section' => 'account',
                'key' => 'overview_sub_title',
                'value' => $subTitle
            ]);
        }
        $insertBtnTitles = PageKeyValue::where('module', 'home')->where('section', 'account')->where('key', 'btn_title')->first();
        $btnTitle = $data['btn_title'];
        if(!$insertBtnTitles){
            PageKeyValue::create([
                'module' => 'home',
                'section' => 'account',
                'key' => 'btn_title',
                'value' => $btnTitle
            ]);
        }else{
            $insertBtnTitles->update([
                'module' => 'home',
                'section' => 'account',
                'key' => 'btn_title',
                'value' => $btnTitle
            ]);
        }
        $insertBtnRedirect = PageKeyValue::where('module', 'home')->where('section', 'account')->where('key', 'btn_redirect')->first();
        $btnRedirect = $data['btn_redirect'];
        if(!$insertBtnRedirect){
            PageKeyValue::create([
                'module' => 'home',
                'section' => 'account',
                'key' => 'btn_redirect',
                'value' => $btnRedirect
            ]);
        }else{
            $insertBtnRedirect->update([
                'module' => 'home',
                'section' => 'account',
                'key' => 'btn_redirect',
                'value' => $btnRedirect
            ]);
        }

        Session::flash('success', 'Updated');

        return back();
    }

    public function pageSlider(){
      $pageSlider = Image::where('module', 'page-slider')->where('section', 'page-slider')->get();

      $data = [
          "pageSlider" => $pageSlider
      ];
      return view('backend.home.pageslider')->with($data);
    }

    public function pageSliderStore(Request $request) {
        $data = $request->except(['_token', 'row_num']);
        $rows = $request->row_num;

        if($request->row_id)  $current_images = Image::where('module', 'page-slider')->where('section', 'page-slider')->whereNotIn('id', $request->row_id)->get();
        else $current_images = collect();

        DB::beginTransaction();
        if(!empty($rows)){
            foreach($rows as $row){
                $insertData = array('module' => 'page-slider', 'section' => 'page-slider');

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
                if(!isset($data['row_id'][$row])){
                    Image::create( $insertData);
                }else{
                    Image::updateOrCreate( [
                        'id' => $data['row_id'][$row],
                    ], $insertData);
                }
            }
        }else{
            $current_images = Image::where('module', 'page-slider')->where('section', 'page-slider')->get();
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
