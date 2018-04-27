<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Admin;
class masukController extends Controller
{
    function index(){
        if(!Session::get('login')==TRUE){
            return redirect()->route('login');
        } else {
            if(Session::get('level')=='admin'){
                return redirect()->route('home.admin');
            } else if(Session::get('level')=='user'){
                return redirect()->route('home.user');
            }
        }
    }
    function login(){
        return view('login');
    }
    function loginPost(Request $request){
        $data1 = User::where('name',$request->name)->first();
        $data2 = Admin::where('name',$request->name)->first();
        if(count($data1)>0){
            $hash1 = $data1->password;
            if(Hash::check($request->password,$hash1)){
                Auth::guard('Users')->LoginUsingId($data1->id);
                $id = $data1->id;
                Session::put('name',$data1->name);
                Session::put('level','user');
                Session::put('login',TRUE);
                return redirect()->route('home.user');
            } else {
                return redirect()->route('login')->with('alert','Username/Password Anda salah !');
            }
        } else if(count($data2)>0){
            $hash2 = $data2->password;
            if(Hash::check($request->password,$hash2)){     
                Auth::guard('Admins')->LoginUsingId($data2->id);
                $id = $data2->id;
                Session::put('name',$data2->name);
                Session::put('level','admin');
                Session::put('login',TRUE);
                return redirect()->route('home.admin');
            } else {
                return redirect()->route('login')->with('alert','Username/Password Anda salah !');
            }
        } else {
            return redirect()->route('login')->with('alert','Username/Password Anda salah !');
        }
        
    }
    function homeUser(Request $request){
        if(Session::get('level')!='user' || Session::get('login')!=TRUE){
            return redirect()->route('login');
        } else {
            return view('Users.users');    
        }
    }
    function homeAdmin(Request $request){
        if(Session::get('level')!='admin' || Session::get('login')!=TRUE){
            return redirect()->route('login');
        } else {
            return view('Admin.admin');    
        }
    }
    function logout(){
        Session::flush();
        return redirect()->route('login');
    }
}
