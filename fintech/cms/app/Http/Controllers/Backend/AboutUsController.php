<?php

namespace App\Http\Controllers\Backend;

use App\About;
use App\Bullet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HeroSetup;
use App\Image;
use App\PageKeyValue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
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
        $about = About::all();

        if($about->first()){
            $profile = $about->where('section', 'aboutus')->first();
            $mission = $about->where('section', 'mission')->first();
            $vision = $about->where('section', 'vision')->first();
            $goals = $about->where('section', 'goals')->first();
            $values = $about->where('section', 'values')->first();
        }else{
            $profile = null;
            $mission = null;
            $vision = null;
            $goals = null;
            $values = null;
        }

        $bullets = Bullet::all();

        $data = [
            'profile' => $profile,
            'mission' => $mission,
            'vision' => $vision,
            'goals' => $goals,
            'values' => $values,
            'bullets' => $bullets
        ];
        return view('backend.about.index')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:191',
            'image' => 'sometimes|mimes:jpeg,png,svg|max:5120',
        ]);
        $data = $request->except(['_token', 'image']);

        if ($request->hasFile('image')) {

            if ($request->file('image')->isValid()) {
                $image = $request->file('image');
                $extension = $image->extension();
                $name = time()."_".rand(1000, 9999);
                $image->storeAs('/public/backend', $name.".".$extension);
                $url = Storage::url('backend/'.$name.".".$extension);
                $data ['image'] = $url;
            }
        }

        $about = About::create($data);

        Session::flash('success', 'Created');

        return back();
    }

    public function edit(Request $request){
        $about = About::find($request->id);

        return view('backend.about.edit')->with([
            'about' => $about
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|max:191',
            'image' => 'sometimes|mimes:jpeg,png,svg|max:5120',
        ]);
        $data = $request->except(['_token', 'image']);
        $about = About::find($request->id);

        if ($request->hasFile('image')) {

            if ($request->file('image')->isValid()) {
                $image = $request->file('image');
                $extension = $image->extension();
                $name = time()."_".rand(1000, 9999);
                $image->storeAs('/public/backend', $name.".".$extension);
                $url = Storage::url('backend/'.$name.".".$extension);
                $data ['image'] = $url;
            }
            if($about->image){
                if(file_exists(public_path($about->image))){
                    unlink(public_path($about->image));
                }
            }
        }

        $about->update($data);
        Session::flash('success', 'Updated');

        return redirect()->route('admin.aboutus.get');
    }

    public function bullets(Request $request)
    {
        $data = $request->except(['_token']);
        $rows = $request->row_num;

        DB::beginTransaction();
        if(!empty($rows)){
            if(!array_key_exists('row_id', $data)) $data['row_id'] = array();
            foreach($rows as $row){
                $insertData = array('section' => $data['section'][$row], 'point' =>  $data['point'][$row]);

                if(isset($data['row_id'][$row])){
                    Bullet::where('section', $data['section'][$row])->where('id', $data['row_id'][$row])->update($insertData);
                }else{
                    $created = Bullet::create($insertData);
                    if(array_key_exists('row_id', $data)) array_push($data['row_id'], $created->id);
                }
            }
        }

        if(isset($data['row_id'])){
            Bullet::whereNotIn('id', $data['row_id'])->delete();
        }else{
            Bullet::whereNotNULL('id')->delete();
        }

        DB::commit();
        Session::flash('success', 'Updated');

        return back();
    }
}
