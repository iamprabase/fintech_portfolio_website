<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
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
    public function index(User $user)
    {
        $data = [
            'email' => $user->email,
            'name' => $user->name,
            'created_at' => $user->created_at,

        ];
        return view('backend.profile.index')->with($data);
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'sometimes|required'
        ]);
        $user->name = $request->name;
        $user->update();

        Session::flash('success', 'Updated');
        return back();

    }
}
