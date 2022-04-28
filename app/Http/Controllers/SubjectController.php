<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
   
    public function index()
    {
        $data['subjects']=Subject::all();
        return view("admin/manageSubject",$data);
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $data=$request->validate([
            'subjectname'=>'required',
            'class'=>'required',
            'bookrate'=>'required',
            'discountbookrate'=>'required',
        ]);
        Subject::create($data);
        return redirect()->route("subject.index");
    }

    
    public function show(Subject $subject)
    {
        //
    }

    
    public function edit(Subject $subject)
    {
        //
    }

    
    public function update(Request $request, Subject $subject)
    {
        //
    }

    
    public function destroy(Subject $subject)
    {
        //
    }
}
