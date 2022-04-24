<?php

namespace App\Http\Controllers;

use App\Models\{Routeing,Student,Teacher,Clases};
use Illuminate\Http\Request;

class RouteingController extends Controller
{
    
    public function index()
    {
        $data['students']=Student::all();
        $data['teachers']=Teacher::all();
        $data['clases']=Clases::withcount("class")->get();
        
        return view("admin/manageRoutings",$data);
    }

    public function viewRouting($id){
        $data['routings']=Routeing::where("clases_id",$id)->get();
        return view("admin/viewRouting",$data);
    }
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

    
    public function show(Routeing $routeing)
    {
        //
    }

   
    public function edit(Routeing $routeing)
    {
        //
    }

   
    public function update(Request $request, Routeing $routeing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Routeing  $routeing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Routeing $routeing)
    {
        //
    }
}
