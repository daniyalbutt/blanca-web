<?php

namespace App\Http\Controllers;

use App\Models\ChecklistDocs;
use Illuminate\Http\Request;
use App\Models\NutritionistClient;

class ChecklistDocsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChecklistDocs  $checklistDocs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = NutritionistClient::find($id);
        return view('admin.checklist.index', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChecklistDocs  $checklistDocs
     * @return \Illuminate\Http\Response
     */
    public function edit(ChecklistDocs $checklistDocs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChecklistDocs  $checklistDocs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChecklistDocs $checklistDocs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChecklistDocs  $checklistDocs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChecklistDocs $checklistDocs)
    {
        //
    }

    public function insertFiles(Request $request, $id){
        if($request->hasfile('images'))
        {
            $files_array = array();
            $i = 0;
            foreach($request->file('images') as $file)
            {
                $file_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $name = $file_name . '_' . $i . '_]' .time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/files/', $name);
                $i++;
                $client_file = new ChecklistDocs();
                $client_file->name = $file_name;
                $client_file->path = $name;
                $client_file->nutritionist_client_id = $id;
                $client_file->user_id = Auth()->user()->id;
                $client_file->user_check = Auth()->user()->isAdmin;
                $client_file->save();
            }
        }
        return response()->json(['uploaded' => 'success', 'status' => true]);
    }
}
