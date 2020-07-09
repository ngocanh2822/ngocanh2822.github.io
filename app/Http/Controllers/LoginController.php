<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Alert;
class LoginController extends Controller
{
    public function checklogin(Request $rq){
    	$email = $rq->user_name;
    	$password = $rq->password;
    	if (Auth::attempt(['email'=>$email,'password'=>$password])) {
            if(Auth::user()->level==1){
                return redirect()->route('ad_index');
            }
    		else{
                return redirect()->route('index'); 
            }
    	}
    	else{
    		Alert::error('Lỗi','Sai Email hoặc mật khẩu');
    		return redirect()->back()->withInput();
    	}
    }
    public function logout(){
    	Auth::logout();
    	return redirect()->route('login');
    }
}
