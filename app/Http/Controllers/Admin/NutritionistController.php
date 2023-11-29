<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Redirect;
use App\Models\User;
use App\Models\NutritionistClient;
use Hash;

class NutritionistController extends Controller
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
        $data = User::where('isAdmin', 1)->orderBy('id', 'desc')->get();
        return view('admin.nutritionist.index', compact('data'));
    }

    public function create(){
        return view('admin.nutritionist.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'name' => 'required|string|max:50',
            'password' => 'required',
            'phone' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->comment = $request->comment;
        $user->isAdmin = 1;
        $user->save();
        return redirect()->back()->with('success', 'Nutritionist Created Successfully.');

    }

    public function show($id){
        $data = User::find($id);
        $clients = User::where('isAdmin', 2)->get();
        return view('admin.nutritionist.show', compact('data', 'clients'));
    }

    public function storeClient(Request $request){
        $validator = Validator::make($request->all(), [
            'nutritionist_id' => 'required',
            'client_id' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $nutritionist_client = new NutritionistClient();
        $nutritionist_client->nutritionist_id = $request->nutritionist_id;
        $nutritionist_client->client_id = $request->client_id;
        $nutritionist_client->save();
        return redirect()->back()->with('success', 'Client add to Nutritionist Created Successfully.');
    }
}
