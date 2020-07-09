<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Alert;
use App\User;

class LoginController extends Controller
{
    public function checklogin(Request $rq){
    	$email = $rq->email;
    	$password = $rq->password;
    	if (Auth::attempt(['email'=>$email,'password'=>$password])) {
            if(Auth::user()->level==1){
                return redirect()->route('donhang.index');
            }
    		else{
                return redirect()->route('dichvu'); 
            }
    	}
    	else{
    		Alert::error('Lỗi','Sai Email hoặc mật khẩu');
    		return redirect()->back()->withInput();
    	}
    }
    public function logout(){
    	Auth::logout();
    	return redirect()->route('index');
    }
}
