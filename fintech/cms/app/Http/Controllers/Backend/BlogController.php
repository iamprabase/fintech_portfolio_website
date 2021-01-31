<?php

namespace App\Http\Controllers\Backend;

use App\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
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
        $blogs = Blog::all();

        $data =[
            'blogs' => $blogs
        ];
        return view('backend.blogs.index')->with($data);
    }

    public function create(){
        $action = route('admin.blog.create.post');
        $blog = null;
        $hidden_method = null;

        return view('backend.blogs.create', compact('action', 'blog', 'hidden_method'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:191',
            'sub_title' => 'max:191',
            'published_date' => 'date:Y-m-d',
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
        $slug = Str::slug($data['title']).'-'.time();
        $data['slug'] = $slug;
        $data['user_id'] = Auth::id();

        $create = Blog::create($data);
        DB::commit();
        Session::flash('success', 'Created');

        return redirect()->route('admin.blog.get');
    }

    public function edit(Request $request){
        $id = $request->id;
        $action = route('admin.blog.edit.patch', [$id]);
        $blog = Blog::findOrFail($id);
        $hidden_method = 'PATCH';

        $data = [
            'action' => $action,
            'blog' => $blog,
            'hidden_method' => $hidden_method,
        ];

        return view('backend.blogs.create')->with($data);
    }

    public function update(Request $request){
         $request->validate([
            'title' => 'required|max:191',
            'sub_title' => 'max:191',
            'published_date' => 'date:Y-m-d',
            'image' => 'sometimes|mimes:jpeg,png,svg|max:5120',
        ]);
        $blog = Blog::find($request->id);
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
                    if($blog->image){
                        if(file_exists(public_path($blog->image))){
                            unlink(public_path($blog->image));
                        }
                    }
                }else{
                    Session::flash('error', 'The overview image must be jpeg, png, jpg, gif, svg.');

                    return back();

                }
            }
        }
        $slug = Str::slug($data['title']).'-'.time();
        $data['slug'] = $slug;

        $create = $blog->update($data);
        DB::commit();
        Session::flash('success', 'Updated');

        return redirect()->route('admin.blog.get');
    }

    public function destroy(Request $request){
        try{
            $blog = Blog::find($request->id);
            if($blog){
                if($blog->image){
                    if(file_exists(public_path($blog->image))){
                        unlink(public_path($blog->image));
                    }
                }
            }
            $blog->delete();

            Session::flash('success', 'Deleted');

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
