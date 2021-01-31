<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use App\PageKeyValue;
use App\Portfolio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
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
        $overview_texts = PageKeyValue::where('module', 'home')->where('section', 'portfolio')->get(['key', 'value'])->toArray();
        $overview_title = NULL;
        $overview_sub_title = NULL;

        if(!empty($overview_texts)){
            foreach($overview_texts as $overview_text){
                if($overview_text['key'] == "overview_title") $overview_title = $overview_text['value'];
                elseif($overview_text['key'] == "overview_sub_title") $overview_sub_title = $overview_text['value'];
            }
        }

        $portfolios = Portfolio::all();

        $data = [
            'overview_title' => $overview_title,
            'overview_sub_title' => $overview_sub_title,
            'portfolios' => $portfolios
        ];
        return view('backend.portfolio.index')->with($data);
    }

    public function homePortfolioStore(Request $request)
    {
        $request->validate([
            'overview_title' => 'max:191',
            'hero_back' => 'sometimes|mimes:jpeg,png,svg|max:5120',
        ]);
        $data = $request->except(['_token', 'hero_back']);
        $insertTitles = PageKeyValue::where('module', 'home')->where('section', 'portfolio')->where('key', 'overview_title')->first();
        $title = $data['overview_title'];
        if(!$insertTitles){
            PageKeyValue::create([
                'module' => 'home',
                'section' => 'portfolio',
                'key' => 'overview_title',
                'value' => $title
            ]);
        }else{
            $insertTitles->update([
                'module' => 'home',
                'section' => 'portfolio',
                'key' => 'overview_title',
                'value' => $title
            ]);
        }
        $insertSubTitles = PageKeyValue::where('module', 'home')->where('section', 'portfolio')->where('key', 'overview_sub_title')->first();
        $subTitle = $data['overview_sub_title'];
        if(!$insertSubTitles){
            PageKeyValue::create([
                'module' => 'home',
                'section' => 'portfolio',
                'key' => 'overview_sub_title',
                'value' => $subTitle
            ]);
        }else{
            $insertSubTitles->update([
                'module' => 'home',
                'section' => 'portfolio',
                'key' => 'overview_sub_title',
                'value' => $subTitle
            ]);
        }

        DB::commit();

        Session::flash('success', 'Updated');

        return back();
    }

    public function create(){
        $action = route('admin.portfolio.create.post');
        $portfolio = null;
        $hidden_method = null;

        return view('backend.portfolio.create', compact('action', 'portfolio', 'hidden_method'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'max:191',
            'name' => 'max:191',
            'image' => 'sometimes|mimes:jpeg,png,svg|max:5120',
        ]);

        $data =  $request->except(['_token', 'image']);
        DB::beginTransaction();
        if($request->has('image')){
            $image = $request->image;
            if ($image->isValid()) {
                $extension = $image->extension();
                if(in_array($extension, ['jpeg', 'png', 'jpg', 'gif', 'svg'])){
                    $name = time()."_".rand(1000, 9999);
                    $image->storeAs('/public/backend', $name.".".$extension);
                    $url = Storage::url('backend/'.$name.".".$extension);
                    $data['image'] = $url;
                }else{
                    Session::flash('error', 'The image must be jpeg, png, jpg, gif, svg.');

                    return back();

                }
            }
        }

        $create = Portfolio::create($data);
        DB::commit();
        Session::flash('success', 'Created');

        return redirect()->route('admin.portfolio.get');
    }

    public function edit(Request $request){
        $id = $request->id;
        $action = route('admin.portfolio.edit.patch', [$id]);
        $portfolio = Portfolio::findOrFail($id);
        $hidden_method = 'PATCH';

        $data = [
            'action' => $action,
            'portfolio' => $portfolio,
            'hidden_method' => $hidden_method,
        ];

        return view('backend.portfolio.create')->with($data);
    }

    public function update(Request $request){
        $request->validate([
            'title' => 'max:191',
            'name' => 'max:191',
            'image' => 'sometimes|mimes:jpeg,png,svg|max:5120',
        ]);
        $portfolio = Portfolio::find($request->id);
        $data =  $request->except(['_token', 'image']);
        DB::beginTransaction();
        if($request->has('image')){
            $image = $request->image;
            if ($image->isValid()) {
                $extension = $image->extension();
                if(in_array($extension, ['jpeg', 'png', 'jpg', 'gif', 'svg'])){
                    $name = time()."_".rand(1000, 9999);
                    $image->storeAs('/public/backend', $name.".".$extension);
                    $url = Storage::url('backend/'.$name.".".$extension);
                    $data['image'] = $url;
                    if($portfolio->image){
                        if(file_exists(public_path($portfolio->image))){
                            unlink(public_path($portfolio->image));
                        }
                    }
                }else{
                    Session::flash('error', 'The overview image must be jpeg, png, jpg, gif, svg.');

                    return back();

                }
            }
        }

        $create = $portfolio->update($data);
        DB::commit();
        Session::flash('success', 'Updated');

        return redirect()->route('admin.portfolio.get');
    }

    public function destroy(Request $request){
        try{
            $portfolio = Portfolio::find($request->id);
            if($portfolio){
                if($portfolio->image){
                    if(file_exists(public_path($portfolio->image))){
                        unlink(public_path($portfolio->image));
                    }
                }
            }
            $portfolio->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Deleted',
                'info' => 'success'
            ]);
        }catch(\Exception $e){
            Log::info($e->getCode());

            return response()->json([
                'status' => 400,
                'message' => 'Failed Deleting',
                'info' => 'error'
            ]);
        }
    }
}
