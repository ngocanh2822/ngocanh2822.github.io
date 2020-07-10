<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donhang;
use App\Naptien;
use App\Yeucau;
use Auth;
use App\Users;
use Alert;
use DB;
use Illuminate\Support\Facades\Validator;
class AdminController extends Controller
{
    function index(){
    	$donhang = new Donhang;
    	$newlist = $donhang->get_newlist();
    	return view('admin.pages.newlist',compact('newlist'));
    }
    public function listcomplete(){
    	$donhang = new Donhang;
    	$donhang = $donhang->listcomplete();
    	return view('admin.pages.hoanthanh',compact('donhang'));
    }
    public function lichsu(){
        $naptien = new Naptien;
        $lichsu = $naptien->get_newlist();
        return view('admin.pages.lichsunaptien',compact('lichsu'));
    }
    public function register(){
        return view('admin.login.register');
    }
    public function setting(){
        return view('admin.login.setting');
    }
    public function update_admin(Request $rq){
        $id = Auth::user()->id;
        $user = new Users;
        $name = isset($rq->name) ? $rq->name : Auth::user()->name;
        $email = isset($rq->email) ? $rq->email : Auth::user()->email;
        $password = $rq->password;
        $pw_new = $rq->pw_new;
        $pw_confirm = $rq->pw_confirm;
        

        if (!empty($password)) {
            if(Auth::attempt(['name'=>Auth::user()->name,'password'=>$password])){
                if (empty($pw_new) || empty($pw_confirm)) {
                    Alert::error('Error','Không được để trống mật khẩu mới');
                    return redirect()->back()->withInput();
                }
                if ($pw_new != $pw_confirm) {
                    
                    Alert::error('Error','Xác nhận mật khẩu mới không đúng');
                    return redirect()->back()->withInput();
                }
                $pw_new = bcrypt($pw_new);
                $array = array('name'=>$name,'email'=>$email,'password'=>$pw_new);
                $user->update_admin($id,$array);
                //Auth::attempt(['name'=>$name,'password'=>$pw_confirm]);
                Alert::success('Complete','Đã lưu');
                return redirect()->back();
            }
            else{
                Alert::error('Error','Mật khẩu cũ không khớp');
                return redirect()->back()->withInput();
            }
        }
        else{
            $array = array('name'=>$name,'email'=>$email);
                $user->update_admin($id,$array);
                Alert::success('Complete','Đã lưu');
                return redirect()->back();
        }
        // $password = bcrypt(123);
        // $array = ['password'=>$password];
        // $user->update_admin($id,$array);
        // return redirect()->back();
    }
    public function yeucauhoanthanh(){
        $yeucau = new Yeucau;
        $datas = $yeucau->listcomplete();
        return view('admin.pages.yeucauhoanthanh',compact('datas'));
    }
    public function new_admin(Request $rq){
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
        if(!empty($user->name)){
            return redirect()->back()->withErrors(['name'=>'Tên đã được sử dụng'])->withInput();
        }
        if(!empty($user->email)){
            return redirect()->back()->withErrors(['email'=>'Email đã được sử dụng'])->withInput();
        }
        if ($password != $password_confirm) {
            return redirect()->back()->withErrors(['password_confirm'=>'Xác nhận mật khẩu không đúng'])->withInput();
        }

        $users = new Users;
        $users->name = $name;
        $users->email = $email;
        $users->password = bcrypt($password);
        $users->level = 1;
        $users->save();
        Alert::success('Complete','Đã tạo thành công');
        return redirect()->back();

    }
}
