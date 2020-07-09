<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type_chucnang;
use App\Muaban;
use App\Ripnick;
use App\Doiten;
use App\Baomat;
use App\Users;
use App\User;
use Carbon\Carbon;
use App\Donhang;
use Auth;
Use Alert;
class Pagecontroller extends Controller
{
    function getIndex()
    {
    	return view("user.layouts.content");
    }
    function getLienhe()
    {
        return view("user.layouts.lienhe");
    }
    function getLogin()
    {
        if (Auth::check() && Auth::user()->level==0) {
            return redirect()->route('dichvu');
        }
        if (Auth::check() && Auth::user()->level==1) {
            return redirect()->route('donhang.index');
        }
        return view("user.layouts.login");
    }
    // function postLogin()
    // {
    //     $chucnang = Type_chucnang::all();
    //     return view("user.content.trangchu",compact('chucnang'));
    // }
    function getDichvu()
    {
    	$chucnang = Type_chucnang::all();
    	return view("user.content.trangchu",compact('chucnang'));
    }

    function getuserpayment()
    {
        $user_money = Auth::user()->user_money;  
        $j = 0;
            $n = strlen($user_money)-1;
            for ($l=$n; $l >=0; $l--) { 
                $j++;
                if ($j%3 == 0 && $j != $n+1) {
                    $user_money = substr($user_money, 0, $l) . "." . substr($user_money, $l);
                }
            }
        return view("user.content.naptien",compact('user_money'));
    }
    function getTaikhoan()
    {
        $user_money = Auth::user()->user_money;  
        $j = 0;
            $n = strlen($user_money)-1;
            for ($l=$n; $l >=0; $l--) { 
                $j++;
                if ($j%3 == 0 && $j != $n+1) {
                    $user_money = substr($user_money, 0, $l) . "." . substr($user_money, $l);
                }
            }
        return view("user.content.taikhoan",compact('user_money'));
    }
    function postTaikhoan(Request $request)
    {
        $id = Auth::user()->id;   
        $email = Auth::user()->email;
        $name = isset($request->hoten) ? $request->hoten : Auth::user()->name;
        $user_sdt = isset($request->SDT) ? $request->SDT : Auth::user()->user_sdt;
        $user_fbid = isset($request->fbid) ? $request->fbid : Auth::user()->user_fbid;
        $mkm1=$request->mkm1;
        $mkm2=$request->mkm2;
        $mkc=$request->mkc;
        if(isset($mkc) && isset($mkm1) && isset($mkm2)) 
        {
            if($mkm1 != $mkm2)
            {
                Alert::error('Lỗi!', 'Mật khẩu mới và xác nhận mật khẩu mới phải giống nhau!!');
                return redirect()->back()->withInput();
            }
            if(Auth::attempt(['email'=>$email,'password'=>$mkc]) && $mkm1 == $mkm2)
            {
                $password = bcrypt($mkm1);
                User::where('id', $id)
                ->update(['password'=>$password,'name'=>$name,'user_sdt'=>$user_sdt,'user_fbid'=>$user_fbid]);
 
                Alert::success('Thành công!', 'Lưu thay đổi thành công');
                return redirect()->back();  
            }
            else
            {
                Alert::error('Lỗi!', 'Mật khẩu không đúng!');
                    return redirect()->back()->withInput();
            }
            
        }
        else
        {
            Alert::error('Lỗi!', 'Không để trống nội dung!');
            return redirect()->back();
        }

    }
    function fbbuysell()
    {
    	return view("user.content.muaban");
    }
    function fbripnick()
    {
        return view("user.content.ripnick");
    }
    function fbrename()
    {
        return view("user.content.doiten");
    }
    function fbsecurity()
    {
        return view("user.content.baomat");
    }
    function postfbbuysell(Request $request)
    {
        $id = Auth::user()->id;  
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $muaban = new Muaban();
        $muaban->loainick=$request->loainick;
        $muaban->SL=$request->SL;
        $muaban->SDT=$request->SDT;
        $muaban->ID_chucnang="9";
        $muaban->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $muaban->thoigian=$tg;
        $muaban->ID_user= $id;
        $muaban->trangthai="1";
        if(isset($request->loainick) && isset($request->SL) && isset($request->SDT)){
            $muaban->save();
            Alert::success('Thành công!', 'Gửi yêu cầu thành công');
            return redirect()->back();
        }
        else{
            Alert::error('Lỗi!', 'Không để trống nội dung');
            return redirect()->back();
        }

    }
    function postfbripnick(Request $request)
    {
        $id = Auth::user()->id;  
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $ripnick = new ripnick();
        $ripnick->link=$request->link;
        $ripnick->loairip=$request->loairip;
        $ripnick->loaithoigian=$request->loaithoigian;
        $ripnick->SDT=$request->SDT;
        $ripnick->ID_chucnang="10";
        $ripnick->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $ripnick->thoigian=$tg;
        $ripnick->ID_user=$id;
        $ripnick->trangthai="1";
        if(isset($request->link)&& isset($request->loairip)&& isset($request->loaithoigian) && isset($request->SDT) ){
            $ripnick->save();
            Alert::success('Thành công!', 'Gửi yêu cầu thành công');
            return redirect()->back();
        }
        else{
            Alert::error('Lỗi!', 'Không để trống nội dung');
            return redirect()->back();
        }

    }
     function postfbrename(Request $request)
    {
        $id = Auth::user()->id;  
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $doiten = new Doiten();
        $doiten->link=$request->link;
        $doiten->tendoi=$request->tendoi;
        $doiten->SDT=$request->SDT;
        $doiten->ID_chucnang="11";
        $doiten->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $doiten->thoigian=$tg;
        $doiten->ID_user= $id;
        $doiten->trangthai="1";
        if(isset($request->link)&& isset($request->tendoi)&& isset($request->SDT) ){
            $doiten->save();
            Alert::success('Thành công!', 'Gửi yêu cầu thành công');
            return redirect()->back();
        }
        else{
            Alert::error('Lỗi!', 'Không để trống nội dung');
            return redirect()->back();
        }

    }
     function postfbsecurity(Request $request)
    {
        $id = Auth::user()->id;  
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $baomat = new Baomat();
        $baomat ->link=$request->link;
        $baomat ->loaibaomat=$request->loaibaomat;
        $baomat ->thangbaomat=$request->thangbaomat;
        $baomat ->SDT=$request->SDT;
        $baomat ->ID_chucnang="12";
        $baomat ->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $baomat ->thoigian=$tg;
        $baomat->ID_user=$id;
        $baomat->trangthai="1";
        if(isset($request->link)&& isset($request->loaibaomat) && isset($request->thangbaomat)&& isset($request->SDT) ){
            $baomat ->save();
            Alert::success('Thành công!', 'Gửi yêu cầu thành công');
            return redirect()->back();
        }
        else{
            Alert::error('Lỗi!', 'Không để trống nội dung');
            return redirect()->back();
        }

    }

    function fblikepost()
    {
        return view("user.content.bufflikepost");
    }
    function postfblikepost(Request $request)
    {
        $id = Auth::user()->id;
        $money  = Auth::user()->user_money;
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $donhang = new Donhang();
        $donhang->ID_chucnang="19";
        $donhang->thoigianorder=$tg;
        $donhang->tongtien=$request->thanhtien;
        $donhang->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $donhang->ID_user=$id;
        $donhang->trangthai="1";
        if(isset($request->link)&& isset($request->sl)&& isset($request->camxuc) && isset($request->dongia) )
        {
            if($donhang->tongtien <= $money  )
            {
                $noidung = "Link: ".$request->link."<br/> Cảm xúc: ".$request->camxuc."<br/> Số lượng: ".$request->sl."<br/> Đơn giá: ".$request->dongia;
                $donhang->noidung= $noidung;
                $donhang->save();
                $money = $money - $donhang->tongtien;
                $user = new Users;
                $user->thanhtoan($id,$money);
                Alert::success('Thành công!', 'Tạo tiến trình thành công');
                return redirect()->back();
            }
            else
            {
                Alert::error('Lỗi!', 'Số tiền trong tài khoản của bạn không đủ');
                return redirect()->back();
            }
            
        }
        else{
            Alert::error('Lỗi!', 'Không để trống nội dung');
            return redirect()->back();
        }

    }
    function fbsub()
    {
        return view("user.content.buffsub");
    }
    function postfbsub(Request $request)
    {
        $id = Auth::user()->id;
        $money  = Auth::user()->user_money;
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $donhang = new Donhang();
        $donhang->ID_chucnang="20";
        $donhang->thoigianorder=$tg;
        $donhang->tongtien=$request->thanhtien;
        $donhang->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $donhang->ID_user=$id;
        $donhang->trangthai="1";
        if(isset($request->link)&& isset($request->sl) && isset($request->dongia) )
        {
            if($donhang->tongtien <= $money  )
            {
                $noidung = "Link: ".$request->link."<br/> Số lượng: ".$request->sl."<br/> Đơn giá: ".$request->dongia ;
                $donhang->noidung= $noidung;
                $donhang->save();
                $money = $money - $donhang->tongtien;
                $user = new Users;
                $user->thanhtoan($id,$money);
                Alert::success('Thành công!', 'Tạo tiến trình thành công');
                return redirect()->back();
            }
            else
            {
                Alert::error('Lỗi!', 'Số tiền trong tài khoản của bạn không đủ');
                return redirect()->back();
            }
        }
        else
        {
            Alert::error('Lỗi!', 'Không để trống nội dung');
            return redirect()->back();
        }

    }
    function fbfanpage()
    {
        return view("user.content.bufffanpage");
    }
    function postfbfanpage(Request $request)
    {
        $id = Auth::user()->id;  
        $money  = Auth::user()->user_money;
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $donhang = new Donhang();
        $donhang->ID_chucnang="21";
        $donhang->thoigianorder=$tg;
        $donhang->tongtien=$request->thanhtien;
        $donhang->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $donhang->ID_user=$id;
        $donhang->trangthai="1";
        if(isset($request->link)&& isset($request->sl) && isset($request->dongia) )
        {
            if($donhang->tongtien <= $money  )
            {
                $noidung = "Link: ".$request->link."<br/> Số lượng: ".$request->sl."<br/> Đơn giá: ".$request->dongia ;
                $donhang->noidung= $noidung;
                $donhang->save();
                $money = $money - $donhang->tongtien;
                $user = new Users;
                $user->thanhtoan($id,$money);
                Alert::success('Thành công!', 'Tạo tiến trình thành công');
                return redirect()->back();
            }
            else
            {
                Alert::error('Lỗi!', 'Số tiền trong tài khoản của bạn không đủ');
                return redirect()->back();
            }
        }
        else{
            Alert::error('Lỗi!', 'Không để trống nội dung');
            return redirect()->back();
        }

    }
    function fbcmt()
    {
        return view("user.content.buffcmt");
    }
    function postfbcmt(Request $request)
    {
        $id = Auth::user()->id;  
        $money  = Auth::user()->user_money;
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $donhang = new Donhang();
        $donhang->ID_chucnang="22";
        $donhang->thoigianorder=$tg;
        $donhang->tongtien=$request->thanhtien;
        $donhang->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $donhang->ID_user=$id;
        $donhang->trangthai="1";
        if(isset($request->link)&& isset($request->noidung) && isset($request->dongia) )
        {
            if($donhang->tongtien <= $money  )
            {
                $noidung = "Link: ".$request->link."<br/> Số lượng: ".$request->sl."<br/> Đơngiá: ".$request->dongia."<br/> Nội dung cmt: ".$request->nd;
                $donhang->noidung= $noidung;
                $donhang->save();
                $money = $money - $donhang->tongtien;
                $user = new Users;
                $user->thanhtoan($id,$money);
                Alert::success('Thành công!', 'Tạo tiến trình thành công');
                return redirect()->back();
            }
            else
            {
                Alert::error('Lỗi!', 'Số tiền trong tài khoản của bạn không đủ');
                return redirect()->back();
            }
        }
        else{
            Alert::error('Lỗi!', 'Không để trống nội dung');
            return redirect()->back();
        }

    }
    function fbshare()
    {
        return view("user.content.buffshare");
    }
    function postfbshare(Request $request)
    {
        $id = Auth::user()->id; 
        $money  = Auth::user()->user_money; 
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $donhang = new Donhang();
        $donhang->ID_chucnang="23";
        $donhang->thoigianorder=$tg;
        $donhang->tongtien=$request->thanhtien;
        $donhang->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $donhang->ID_user=$id;
        $donhang->trangthai="1";
        if(isset($request->link)&& isset($request->sl) && isset($request->dongia) )
        {
            if($donhang->tongtien <= $money  )
            {
                $noidung = "Link: ".$request->link."<br/> Số lượng: ".$request->sl."<br/> Đơn giá: ".$request->dongia ;
                $donhang->noidung= $noidung;
                $donhang->save();
                $money = $money - $donhang->tongtien;
                $user = new Users;
                $user->thanhtoan($id,$money);
                Alert::success('Thành công!', 'Tạo tiến trình thành công');
                return redirect()->back();
            }
            else
            {
                Alert::error('Lỗi!', 'Số tiền trong tài khoản của bạn không đủ');
                return redirect()->back();
            }
        }
        else{
            Alert::error('Lỗi!', 'Không để trống nội dung');
            return redirect()->back();
        }

    }
    function instalike()
    {
        return view("user.content.instalike");
    }
    function postinstalike(Request $request)
    {
        $id = Auth::user()->id;  
        $money  = Auth::user()->user_money; 
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $donhang = new Donhang();
        $donhang->ID_chucnang="1";
        $donhang->thoigianorder=$tg;
        $donhang->tongtien=$request->thanhtien;
        $donhang->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $donhang->ID_user=$id;
        $donhang->trangthai="1";
        if(isset($request->link)&& isset($request->sl) && isset($request->dongia) )
        {
            if($donhang->tongtien <= $money  )
            {
                $noidung = "Link: ".$request->link."<br/> Số lượng: ".$request->sl."<br/> Đơn giá: ".$request->dongia ;
                $donhang->noidung= $noidung;
                $donhang->save();
                $money = $money - $donhang->tongtien;
                $user = new Users;
                $user->thanhtoan($id,$money);
                Alert::success('Thành công!', 'Tạo tiến trình thành công');
                return redirect()->back();
            }
            else
            {
                Alert::error('Lỗi!', 'Số tiền trong tài khoản của bạn không đủ');
                return redirect()->back();
            }
        }
        else{
            Alert::error('Lỗi!', 'Không để trống nội dung');
            return redirect()->back();
        }

    }
    function instafl()
    {
        return view("user.content.instafl");
    }
    function postinstafl(Request $request)
    {
        $id = Auth::user()->id; 
        $money  = Auth::user()->user_money;  
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $donhang = new Donhang();
        $donhang->ID_chucnang="2";
        $donhang->thoigianorder=$tg;
        $donhang->tongtien=$request->thanhtien;
        $donhang->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $donhang->ID_user=$id;
        $donhang->trangthai="1";
        if(isset($request->link)&& isset($request->sl) && isset($request->dongia) )
        {
            if($donhang->tongtien <= $money  )
            {
                $noidung = "Link: ".$request->link."<br/> Số lượng: ".$request->sl."<br/> Đơn giá: ".$request->dongia ;
                $donhang->noidung= $noidung;
                $donhang->save();
                $money = $money - $donhang->tongtien;
                $user = new Users;
                $user->thanhtoan($id,$money);
                Alert::success('Thành công!', 'Tạo tiến trình thành công');
                return redirect()->back();
            }
            else
            {
                Alert::error('Lỗi!', 'Số tiền trong tài khoản của bạn không đủ');
                return redirect()->back();
            }
        }
        else{
            Alert::error('Lỗi!', 'Không để trống nội dung');
            return redirect()->back();
        }

    }
    function instacmt()
    {
        return view("user.content.instacmt");
    }
    function postinstacmt(Request $request)
    {
        $id = Auth::user()->id;  
        $money  = Auth::user()->user_money;  
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $donhang = new Donhang();
        $donhang->ID_chucnang="3";
        $donhang->thoigianorder=$tg;
        $donhang->tongtien="0"; //chưa tính được sl, tổng tiền
        $donhang->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $donhang->ID_user= $id;
        $donhang->trangthai="1";
        if(isset($request->link)&& isset($request->noidung) && isset($request->dongia) )
        {
            if($donhang->tongtien <= $money  )
            {
                $noidung = "Link: ".$request->link."<br/> Số lượng: ".$request->sl."<br/> Đơngiá: ".$request->dongia."<br/> Nội dung cmt: ".$request->noidung;
                $donhang->noidung= $noidung;
                $donhang->save();
                $money = $money - $donhang->tongtien;
                $user = new Users;
                $user->thanhtoan($id,$money);
                Alert::success('Thành công!', 'Tạo tiến trình thành công');
                return redirect()->back();
            }
            else
            {
                Alert::error('Lỗi!', 'Số tiền trong tài khoản của bạn không đủ');
                return redirect()->back();
            }

        }
        else{
            Alert::error('Lỗi!', 'Không để trống nội dung');
            return redirect()->back();
        }

    }
    function viplikemonth()
    {
        return view("user.content.viplikemonth");
    }
    function postviplikemonth(Request $request)
    {
        $id = Auth::user()->id;  
        $money  = Auth::user()->user_money; 
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $donhang = new Donhang();
        $donhang->ID_chucnang="5";
        $donhang->thoigianorder=$tg;
        $donhang->tongtien=$request->thanhtien;
        $donhang->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $donhang->ID_user=$id;
        $donhang->trangthai="1";
        if(isset($request->link)&& isset($request->minlike) && isset($request->maxlike) && isset($request->slbai) && isset($request->slngay) && isset($request->dongia) )
        {
            if($donhang->tongtien <= $money  )
            {
                $noidung = "Link: ".$request->link."<br/> Minlike: ".$request->minlike."<br/> Maxlike: ".$request->maxlike."<br/> Số lượng bài: ".$request->slbai."<br/> Số lượng ngày: ".$request->slngay."<br/> Đơn giá: ".$request->dongia ;
                $donhang->noidung= $noidung;
                $donhang->save();
                $money = $money - $donhang->tongtien;
                $user = new Users;
                $user->thanhtoan($id,$money);
                Alert::success('Thành công!', 'Tạo tiến trình thành công');
                return redirect()->back();
            }
            else
            {
                Alert::error('Lỗi!', 'Số tiền trong tài khoản của bạn không đủ');
                return redirect()->back();
            }
        }
        else{
            Alert::error('Lỗi!', 'Không để trống nội dung');
            return redirect()->back();
        }

    }
    function viplikemount()
    {
        return view("user.content.viplikemount");
    }
    function postviplikemount(Request $request)
    {
        $id = Auth::user()->id;  
        $money  = Auth::user()->user_money; 
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $donhang = new Donhang();
        $donhang->ID_chucnang="6";
        $donhang->thoigianorder=$tg;
        $donhang->tongtien=$request->thanhtien;
        $donhang->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $donhang->ID_user= $id;
        $donhang->trangthai="1";
        if(isset($request->link)&& isset($request->minlike) && isset($request->maxlike) && isset($request->slbai)&& isset($request->dongia) )
        {
            if($donhang->tongtien <= $money  )
            {
                $noidung = "Link: ".$request->link."<br/> Minlike: ".$request->minlike."<br/> Maxlike: ".$request->maxlike."<br/> Số lượng bài: ".$request->slbai."<br/> Đơn giá: ".$request->dongia ;
                $donhang->noidung= $noidung;
                $donhang->save();
                $money = $money - $donhang->tongtien;
                $user = new Users;
                $user->thanhtoan($id,$money);
                Alert::success('Thành công!', 'Tạo tiến trình thành công');
                return redirect()->back();
            }
            else
            {
                Alert::error('Lỗi!', 'Số tiền trong tài khoản của bạn không đủ');
                return redirect()->back();
            }
        }
        else{
            Alert::error('Lỗi!', 'Không để trống nội dung');
            return redirect()->back();
        }

    }
}