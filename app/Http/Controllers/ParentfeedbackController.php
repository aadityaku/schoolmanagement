<?php

namespace App\Http\Controllers;

use App\Models\Parentfeedback;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ParentfeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if($request->method() == "POST"){
        $request->validate([
           'email'=>'required',
           'password'=>'required',
           'work'=>'required',
           'comment'=>'required',
           'parentname'=>'required',
        ]);
        $email=$request->email;
        $password=$request->password;
        $user=User::where([['userType',3],["email",$email]])->first();
        
        if($user){
            if(Hash::check($password,$user->password)){
               $data=new Parentfeedback();
               $data->email=$email;
               $data->password=$password;
               $data->work=$request->work;
               $data->parentname=$request->parentname;
               $data->comment=$request->comment;
               
                $data->user_id=$user->id;
               
               
               $data->save();
               return redirect()->back();
            }
            else{
                return redirect()->back();
            }
        }
        else{
           return redirect()->back();
        }
    }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parentfeedback  $parentfeedback
     * @return \Illuminate\Http\Response
     */
    public function show(Parentfeedback $parentfeedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parentfeedback  $parentfeedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Parentfeedback $parentfeedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parentfeedback  $parentfeedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parentfeedback $parentfeedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parentfeedback  $parentfeedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parentfeedback $parentfeedback)
    {
        //
    }
}
