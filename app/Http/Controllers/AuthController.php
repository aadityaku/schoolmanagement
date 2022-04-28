<?php

namespace App\Http\Controllers;

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
    }
    public function teacherLogin(Request $request){
        $email=$request->email;
        $password=$request->password;
        $user=User::where([['userType',1],["email",$email]])->first();
        
        if($user){
            if(Hash::check($password,$user->password)){
                
                $request->session()->put("teacher",$email);
                return redirect()->route("teacher.dashboard");
            }
            else{
                echo "not password good";
            }
        }
        else{
            echo "email is not exist";
        }

    }
    public function teacherLogout(Request $request){
        $request->session()->forget("teacher");
        return redirect()->route("teacher.login");
 
    }

    public function studentLogin(Request $request){

    }
    public function studentLogout(){
 
    }
    public function staffLogin(Request $request){

    }
    public function staffLogout(){
 
    }

}
