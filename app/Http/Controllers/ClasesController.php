<?php

namespace App\Http\Controllers;

use App\Models\Clases;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['clases']=Clases::all();
        $data['teachers']=Teacher::all();
        return view("admin/manageClass",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'classname'=>'required',
            'teacher_id'=>'required',
            'newadmissionfee'=>'required',
            'readdmissionfee'=>'required',
            'monthlyfee'=>'required',
            'image'=>'required',
            'age'=>'required',
            'time'=>'required',
            'seat'=>'required',
        ]);
        $data=new Clases();
        $data->classname=$request->classname;
        $data->teacher_id=$request->teacher_id;
        $data->newadmissionfee=$request->newadmissionfee;
        $data->readdmissionfee=$request->readdmissionfee;
        $data->monthlyfee=$request->monthlyfee;
        $data->age=$request->age;
        $data->time=$request->time;
        $data->seat=$request->seat;
        $data->description=$request->description;
        $fileName=$request->image->getClientOriginalName();
        $request->image->move(public_path("class"),$fileName);
        $data->image=$fileName;
        $data->save();
        return redirect()->route("clases.index");
    }

  
    public function show(Clases $clases)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clases  $clases
     * @return \Illuminate\Http\Response
     */
    public function edit(Clases $clases)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clases  $clases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clases $clases)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clases  $clases
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clases $clases)
    {
        //
    }
}
