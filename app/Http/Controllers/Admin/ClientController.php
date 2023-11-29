<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Redirect;
use App\Models\User;
use Hash;

class ClientController extends Controller
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
        $data = User::where('isAdmin', 2)->orderBy('id', 'desc')->get();
        return view('admin.client.index', compact('data'));
    }

    public function create(){
        return view('admin.client.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'name' => 'required|string|max:50',
            'phone' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make(array_sum(explode(' ', microtime())));
        $user->comment = $request->comment;
        $user->address = $request->address;
        $user->isAdmin = 2;
        $user->save();
        return redirect()->back()->with('success', 'Client Created Successfully.');

    }
}
