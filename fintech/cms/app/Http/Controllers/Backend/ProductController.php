<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use App\PageKeyValue;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
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
        $overview_texts = PageKeyValue::where('module', 'home')->where('section', 'product')->get(['key', 'value'])->toArray();
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

        $products = Product::all();

        $data = [
            'overview_title' => $overview_title,
            'overview_sub_title' => $overview_sub_title,
            'btn_title' => $btn_title,
            'btn_redirect' => $btn_redirect,
            'products' => $products
        ];
        return view('backend.products.index')->with($data);
    }

    // public function homeServicesStore(Request $request)
    // {
    //     $request->validate([
    //         'overview_title' => 'max:191',
    //         'hero_back' => 'sometimes|mimes:jpeg,png,svg|max:5120',
    //     ]);
    //     $data = $request->except(['_token', 'hero_back']);
    //     $insertTitles = PageKeyValue::where('module', 'home')->where('section', 'product')->where('key', 'overview_title')->first();
    //     $title = $data['overview_title'];
    //     if(!$insertTitles){
    //         PageKeyValue::create([
    //             'module' => 'home',
    //             'section' => 'product',
    //             'key' => 'overview_title',
    //             'value' => $title
    //         ]);
    //     }else{
    //         $insertTitles->update([
    //             'module' => 'home',
    //             'section' => 'product',
    //             'key' => 'overview_title',
    //             'value' => $title
    //         ]);
    //     }
    //     $insertSubTitles = PageKeyValue::where('module', 'home')->where('section', 'product')->where('key', 'overview_sub_title')->first();
    //     $subTitle = $data['overview_sub_title'];
    //     if(!$insertSubTitles){
    //         PageKeyValue::create([
    //             'module' => 'home',
    //             'section' => 'product',
    //             'key' => 'overview_sub_title',
    //             'value' => $subTitle
    //         ]);
    //     }else{
    //         $insertSubTitles->update([
    //             'module' => 'home',
    //             'section' => 'product',
    //             'key' => 'overview_sub_title',
    //             'value' => $subTitle
    //         ]);
    //     }
    //     $insertBtnTitles = PageKeyValue::where('module', 'home')->where('section', 'product')->where('key', 'btn_title')->first();
    //     $btnTitle = $data['btn_title'];
    //     if(!$insertBtnTitles){
    //         PageKeyValue::create([
    //             'module' => 'home',
    //             'section' => 'product',
    //             'key' => 'btn_title',
    //             'value' => $btnTitle
    //         ]);
    //     }else{
    //         $insertBtnTitles->update([
    //             'module' => 'home',
    //             'section' => 'product',
    //             'key' => 'btn_title',
    //             'value' => $btnTitle
    //         ]);
    //     }
    //     $insertBtnRedirect = PageKeyValue::where('module', 'home')->where('section', 'product')->where('key', 'btn_redirect')->first();
    //     $btnRedirect = $data['btn_redirect'];
    //     if(!$insertBtnRedirect){
    //         PageKeyValue::create([
    //             'module' => 'home',
    //             'section' => 'product',
    //             'key' => 'btn_redirect',
    //             'value' => $btnRedirect
    //         ]);
    //     }else{
    //         $insertBtnRedirect->update([
    //             'module' => 'home',
    //             'section' => 'product',
    //             'key' => 'btn_redirect',
    //             'value' => $btnRedirect
    //         ]);
    //     }
    //     $hero_exists = Image::where('module', 'home')->where('section', 'product')->first();
    //     DB::beginTransaction();
    //     if ($request->hasFile('hero_back')) {
    //         if($hero_exists){
    //             if(file_exists(public_path($hero_exists->image))){
    //                 unlink(public_path($hero_exists->image));
    //             }
    //         }

    //         if ($request->file('hero_back')->isValid()) {
    //             $image = $request->file('hero_back');
    //             $extension = $image->extension();
    //             $name = time()."_".rand(1000, 9999);
    //             $image->storeAs('/public/backend', $name.".".$extension);
    //             $url = Storage::url('backend/'.$name.".".$extension);

    //             if(!$hero_exists) Image::create([
    //                 'module' => 'home',
    //                 'section' => 'product',
    //                 'image' => $url
    //             ]);
    //             else $hero_exists->update([
    //                 'image' => $url
    //             ]);
    //         }
    //     }

    //     DB::commit();

    //     Session::flash('success', 'Updated');

    //     return back();
    // }

    public function create(){
        $action = route('admin.products.create.post');
        $product = null;
        $hidden_method = null;

        return view('backend.products.create', compact('action', 'product', 'hidden_method'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:191',
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

        $create = Product::create($data);
        DB::commit();
        Session::flash('success', 'Created');

        return redirect()->route('admin.products.get');
    }

    public function edit(Request $request){
        $id = $request->id;
        $action = route('admin.products.edit.patch', [$id]);
        $product = Product::findOrFail($id);
        $hidden_method = 'PATCH';

        $data = [
            'action' => $action,
            'product' => $product,
            'hidden_method' => $hidden_method,
        ];

        return view('backend.products.create')->with($data);
    }

    public function update(Request $request){
        $request->validate([
            'title' => 'required|max:191',
            'image' => 'sometimes|mimes:jpeg,png,svg|max:5120',
        ]);
        $product = Product::find($request->id);
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
                    if($product->image){
                        if(file_exists(public_path($product->image))){
                            unlink(public_path($product->image));
                        }
                    }
                }else{
                    Session::flash('error', 'The overview image must be jpeg, png, jpg, gif, svg.');

                    return back();

                }
            }
        }

        $create = $product->update($data);
        DB::commit();
        Session::flash('success', 'Created');

        return redirect()->route('admin.products.get');
    }

    public function destroy(Request $request){
        try{
            $product = Product::find($request->id);
            if($product){
                if($product->image){
                    if(file_exists(public_path($product->image))){
                        unlink(public_path($product->image));
                    }
                }
            }
            $product->delete();

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
