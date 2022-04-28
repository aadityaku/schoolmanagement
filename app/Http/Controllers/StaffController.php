<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
   
    public function index()
    {
        $data['staffs']=Staff::all();
        return view("admin/manageStaff",$data);
    }

    
    public function create()
    {
        $data['staffs']=Staff::all();
        return view("admin/manageStaff",$data);
    }

    
    public function store(Request $request)
    {
        $data=$request->validate([
            'staffname'=>'required',
            'job'=>'required',
            'contact'=>'required',
            'address'=>'required',
            'gender'=>'required',
            'worktime'=>'required',
            'monthlyfee'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required',
        ]);
        $user=new User();
        $user->name=$request->staffname;
        $user->email=$request->email;
        $user->userType=2;
        $user->password=Hash::make($request->password);
        $user->save();
        $user_id=$user->id;

        $data=new Staff();
        $data->staffname=$request->staffname;
        $data->job=$request->job;
        $data->contact=$request->contact;
        $data->address=$request->address;
        $data->gender=$request->gender;
        $data->worktime=$request->worktime;
        $data->user_id=$user_id;
        $data->save();

        return redirect()->route("staff.index");

    }
    
    public function staffDashboard(){
        
    }
    
    public function show(Staff $staff)
    {
        //
    }

    
    public function edit(Staff $staff)
    {
        //
    }

    
    public function update(Request $request, Staff $staff)
    {
        //
    }

    
    public function destroy(Staff $staff)
    {
        //
    }
}
