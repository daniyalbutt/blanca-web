<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\ChecklistDocs;

class HomeControllerUser extends Controller
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
        return view('user.home');
    }

    public function userClient(){
        return view('user.client');
    }

    public function userChecklist($id){
        $data = DB::table('nutritionist_client')->where('nutritionist_id', Auth::user()->id)->where('client_id', $id)->first();
        if($data == null){
            return redirect()->back();
        }
        $documents = ChecklistDocs::where('nutritionist_client_id', $data->id)->orderBy('id', 'desc')->get();
        $client = DB::table('users')->where('id', $id)->first();
        return view('user.document', compact('documents', 'client'));
    }


}
