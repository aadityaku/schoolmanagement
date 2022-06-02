<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Blogfeedback;
use App\Models\Clases;
use App\Models\Subject;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['subjects']=Subject::all();
        $data['blogs']=Blog::all();
        return view("admin/manageBlog",$data);
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
            'title'=>'required',
            'author'=>'required',
            'image'=>'required',
            'subject_id'=>'required',
            'description'=>'required',
        ]);
        $data=new Blog();
        $data->title=$request->title;
        $data->author=$request->author;
        $data->subject_id=$request->subject_id;
        $data->description=$request->description;
        $fileName=$request->image->getClientOriginalName();
        $request->image->move(public_path("blog"),$fileName);
        $data->image=$fileName;
        $data->save();
        return redirect()->route("blog.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request , $blog)
    {
        $this->blogView($blog);
        $data['blog']=Blog::find($blog);
        $data['blogs']=Blog::all()->except($blog);
        $data['clases']=Clases::all();
        $data['blogfeedback']=Blogfeedback::where("blog_id",$blog)->get();
        return view("homepages/viewBlog",$data);
    }
  
    public function blogView($id){
        $data=Blog::find($id);
        $data->views +=1;
        $data->save();
    }
    
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
