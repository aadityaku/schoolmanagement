<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Clases;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
   
    public function index()
    {
        $data['students']=Student::all();
        $data['teachers']=Teacher::all();
        $data['clases']=Clases::withcount("class")->get();
        
        return view("admin/manageAttendance",$data);
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show(Attendance $attendance)
    {
        //
    }

   
    public function edit(Attendance $attendance)
    {
        //
    }

    
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

   
    public function destroy(Attendance $attendance)
    {
        //
    }
}
