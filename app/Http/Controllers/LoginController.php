<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Alert;
use App\User;
use App\Users;
use DB;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function checklogin(Request $rq){
    	$name = $rq->name;
    	$password = $rq->password;
    	if (Auth::attempt(['name'=>$name,'password'=>$password])) {
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
    public function checkregister(Request $rq){
        $name = $rq->name;
        $email = $rq->email;
        $password = $rq->password;
        $password_confirm = $rq->password_confirm;
        $messages = [
            'name.required' => 'Không được để trống tên tài khoản.',
            'email.required' => 'Không được để trống tên tài khoản.',
            'password.required' => 'Không được để trống tên tài khoản.',
            'password_confirm.required' => 'Không được để trống tên tài khoản.',
            'name.min' => 'Tên tài khoản phải từ 3 - 20 ký tự.',
            'name.max' => 'Tên tài khoản phải từ 3 - 20 ký tự.',
            'password.min' => 'Mật khẩu phải từ 6 - 15 ký tự.',
            'password.max' => 'Mật khẩu phải từ 6 - 15 ký tự.',
            'password_confirm.min' => 'Mật khẩu phải từ 6 - 15 ký tự.',
            'password_confirm.max' => 'Mật khẩu phải từ 6 - 15 ký tự.',
        ];
        $rules = ([
            'name' => 'required|min:3|max:20',
            'email' => 'email:rfc,dns|required',
            'password' => 'required|min:6|max:15',
            'password_confirm' => 'required|min:6|max:15',
        ]);

        $validator = Validator::make($rq->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = DB::table('users')->select('name','email')->where('name',$name)->orWhere('email',$email)->first();
        if(isset($user->name)){
            return redirect()->back()->withErrors(['name'=>'Tên này đã được sử dụng'])->withInput();
        }
        if(isset($user->email)){
            return redirect()->back()->withErrors(['email'=>'Email này đã đăng ký tài khoản'])->withInput();
        }
        if ($password != $password_confirm) {
            return redirect()->back()->withErrors(['password_confirm'=>'Xác nhận mật khẩu không đúng'])->withInput();
        }

        $users = new Users;
        $users->name = $name;
        $users->email = $email;
        $users->password = bcrypt($password);
        $users->level = 0;
        $users->save();
        Alert::success('Complete','Đăng ký thành công');
        return redirect()->back();

    }
}
