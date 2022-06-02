<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function selectLogin(Request $request){
        $email=$request->email;
        $password=$request->password;
        $userType=$request->userType;
        if($userType == 1){
            return $this->teacherLogin($request);
        }
        if($userType == 3){
            return $this->studentLogin($request);
        }
        if($userType == 2){
            return $this->staffLogin($request);
        }
    }
    public function teacherLogin(Request $request){
        $email=$request->email;
        $password=$request->password;
        $user=User::where([['userType',1],["email",$email]])->first();
        
        if($user){
            if(Hash::check($password,$user->password)){
                
                $request->session()->put("teacher",$email);
                // $data['user']=$user;
                // return view("teacher/master",$data);
                return redirect()->route("teacher.dashboard");
            }
            else{
                return redirect()->back();
            }
        }
        else{
           return redirect()->back();
        }

    }
    public function teacherLogout(Request $request){
        $request->session()->forget("teacher");
        return redirect()->route("teacher.login");
 
    }

    public function studentLogin(Request $request){
        $email=$request->email;
        $password=$request->password;
        $user=User::where([['userType',3],["email",$email]])->first();
        
        if($user){
            if(Hash::check($password,$user->password)){
                
                $request->session()->put("student",$email);
                return redirect()->route("student.dashboard");
            }
            else{
               return redirect()->back();
            }
        }
        else{
            return redirect()->back();
        }

    }
    public function studentLogout(Request $request){
        $request->session()->forget("student");
        return redirect()->route("student.login");
    }
    public function staffLogin(Request $request){
        $email=$request->email;
        $password=$request->password;
        $user=User::where([['userType',2],["email",$email]])->first();
        
        if($user){
            if(Hash::check($password,$user->password)){
                
                $request->session()->put("staff",$email);
                return redirect()->route("staff.dashboard");
            }
            else{
               return redirect()->back();
            }
        }
        else{
           return redirect()->back();
        }


    }
    public function staffLogout(Request $request){
        $request->session()->forget("staff");
        return redirect()->route("staff.login");
    }

}
