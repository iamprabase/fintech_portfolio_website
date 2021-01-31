<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use App\PageKeyValue;
use App\Bod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BodController extends Controller
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

        $bods = Bod::all();

        $data = [
            'bods' => $bods
        ];
        return view('backend.bod.index')->with($data);
    }

    public function create(){
        $action = route('admin.bod.create.post');
        $bod = null;
        $hidden_method = null;

        return view('backend.bod.create', compact('action', 'bod', 'hidden_method'));
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

        $create = Bod::create($data);
        DB::commit();
        Session::flash('success', 'Created');

        return redirect()->route('admin.bod.get');
    }

    public function edit(Request $request){
        $id = $request->id;
        $action = route('admin.bod.edit.patch', [$id]);
        $bod = Bod::findOrFail($id);
        $hidden_method = 'PATCH';

        $data = [
            'action' => $action,
            'bod' => $bod,
            'hidden_method' => $hidden_method,
        ];

        return view('backend.bod.create')->with($data);
    }

    public function update(Request $request){
        $request->validate([
            'title' => 'max:191',
            'name' => 'max:191',
            'image' => 'sometimes|mimes:jpeg,png,svg|max:5120',
        ]);
        $bod = Bod::find($request->id);
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
                    if($bod->image){
                        if(file_exists(public_path($bod->image))){
                            unlink(public_path($bod->image));
                        }
                    }
                }else{
                    Session::flash('error', 'The overview image must be jpeg, png, jpg, gif, svg.');

                    return back();

                }
            }
        }

        $create = $bod->update($data);
        DB::commit();
        Session::flash('success', 'Updated');

        return redirect()->route('admin.bod.get');
    }

    public function destroy(Request $request){
        try{
            $bod = Bod::find($request->id);
            if($bod){
                if($bod->image){
                    if(file_exists(public_path($bod->image))){
                        unlink(public_path($bod->image));
                    }
                }
            }
            $bod->delete();

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
