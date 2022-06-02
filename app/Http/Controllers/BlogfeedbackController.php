<?php

namespace App\Http\Controllers;

use App\Models\Blogfeedback;
use Illuminate\Http\Request;

class BlogfeedbackController extends Controller
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
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'comment'=>'required',
        ]);
        $data=new Blogfeedback();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->comment=$request->comment;
        $data->blog_id=$request->blog_id;
        $data->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blogfeedback  $blogfeedback
     * @return \Illuminate\Http\Response
     */
    public function show(Blogfeedback $blogfeedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blogfeedback  $blogfeedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Blogfeedback $blogfeedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blogfeedback  $blogfeedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blogfeedback $blogfeedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blogfeedback  $blogfeedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blogfeedback $blogfeedback)
    {
        //
    }
}
