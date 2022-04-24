<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Admin;


class CustomAuthController extends Controller
{
    //
   
    public function adminlogin(){
        return view('adminlogin');
    }

    public function checkadminlogin(Request $request){

        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->intended('all');
        }
        return back()->withInput($request->only('email'));
    }
}
