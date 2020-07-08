<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type_chucnang;
use App\Muaban;
use App\Ripnick;
use App\Doiten;
use App\Baomat;
use App\Nguoidung;
use Carbon\Carbon;
use App\Buff_like_post;
use App\Buff_sub;
use App\Buff_fanpage;
use App\Buff_cmt;
use App\Buff_share;
use App\Insta_like;
use App\Insta_follow;
use App\Insta_cmt;
use App\Vip_like_month;
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
        return view("user.layouts.login");
    }
    function postLogin()
    {
        $chucnang = Type_chucnang::all();
        return view("user.content.trangchu",compact('chucnang'));
    }
    function getDichvu()
    {
    	$chucnang = Type_chucnang::all();
    	return view("user.content.trangchu",compact('chucnang'));
    }

    function getuserpayment()
    {
        $info= Nguoidung::where('ID_user',1)->get(); //sửa lại id_user thành session['id']
        return view("user.content.naptien",compact('info'));
    }
    function getTaikhoan()
    {
        $info= Nguoidung::where('ID_user','1')->get(); //sửa lại id_user thành session['id']
        return view("user.content.taikhoan",compact('info'));
    }
    function postTaikhoan(Request $request)
    {
        $nd = Nguoidung::select('*')->where('ID_user',1)->first(); //sửa lại id_user thành session['id']
        $gt = $nd->password;
        $nguoidung = new Nguoidung();
        $nguoidung->user_email = isset($request->email) ? $request->email : $nd->user_email;
        $nguoidung->user_hoten = isset($request->hoten) ? $request->hoten : $nd->user_hoten;
        $nguoidung->user_sdt = isset($request->SDT) ? $request->SDT : $nd->user_sdt;
        $nguoidung->user_fbid = isset($request->fbid) ? $request->fbid : $nd->user_fbid;
        $nguoidung->password = $request->mkm1;
        $mkm1=$request->mkm1;
        $mkm2=$request->mkm2;
        $mkc=$request->mkc;
        if(isset($mkc) && isset($mkm1) && isset($mkm2)) 
        {
            if( $mkm1 == $mkm2 && $mkc == $gt )
            {
                $nguoidung = Nguoidung::where('ID_user', 1)
                ->update(['password'=>$nguoidung->password,'user_email'=>$nguoidung->user_email,'user_hoten'=>$nguoidung->user_hoten,'user_sdt'=>$nguoidung->user_sdt,'user_fbid'=>$nguoidung->user_fbid]);
                $info= Nguoidung::where('ID_user','1')->get(); //sửa lại id_user thành session['id']
                return redirect()->back()->with('success','Lưu thay đổi thành công.',compact('info'));  
            }
            else{
                if($mkm1 == $mkm2 && $mkc != $gt)
                {
                    return redirect()->back()->with('error','Mật khẩu không đúng!');
                }
                if($mkm1 != $mkm2 && $mkc == $gt)
                {
                    return redirect()->back()->with('error','Mật khẩu mới và xác nhận mật khẩu mới phải giống nhau!');
                }
                if($mkm1 != $mkm2 && $mkc != $gt)
                {
                    return redirect()->back()->with('error','Nhập lại mật khẩu!');
                }
            }
            
        }
        else
        {
            return redirect()->back()->with('error','Không để trống nội dung!');
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
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $muaban = new Muaban();
        $muaban->loainick=$request->loainick;
        $muaban->SL=$request->SL;
        $muaban->SDT=$request->SDT;
        $muaban->ID_chucnang="9";
        $muaban->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $muaban->thoigian=$tg;
        if(isset($request->loainick) && isset($request->SL) && isset($request->SDT)){
            $muaban->save();
             return redirect()->back()->with('success','Gửi yêu cầu thành công');
        }
        else{
            return redirect()->back()->with('error','Không để trống nội dung');
        }

    }
    function postfbripnick(Request $request)
    {
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $ripnick = new ripnick();
        $ripnick->link=$request->link;
        $ripnick->loairip=$request->loairip;
        $ripnick->loaithoigian=$request->loaithoigian;
        $ripnick->SDT=$request->SDT;
        $ripnick->ID_chucnang="10";
        $ripnick->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $ripnick->thoigian=$tg;
        if(isset($request->link)&& isset($request->loairip)&& isset($request->loaithoigian) && isset($request->SDT) ){
            $ripnick->save();
             return redirect()->back()->with('success','Gửi yêu cầu thành công');
        }
        else{
            return redirect()->back()->with('error','Không để trống nội dung');
        }

    }
     function postfbrename(Request $request)
    {
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $doiten = new Doiten();
        $doiten->link=$request->link;
        $doiten->tendoi=$request->tendoi;
        $doiten->SDT=$request->SDT;
        $doiten->ID_chucnang="11";
        $doiten->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $doiten->thoigian=$tg;
        if(isset($request->link)&& isset($request->tendoi)&& isset($request->SDT) ){
            $doiten->save();
             return redirect()->back()->with('success','Gửi yêu cầu thành công');
        }
        else{
            return redirect()->back()->with('error','Không để trống nội dung');
        }

    }
     function postfbsecurity(Request $request)
    {
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $baomat = new Baomat();
        $baomat ->link=$request->link;
        $baomat ->loaibaomat=$request->loaibaomat;
        $baomat ->thangbaomat=$request->thangbaomat;
        $baomat ->SDT=$request->SDT;
        $baomat ->ID_chucnang="12";
        $baomat ->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $baomat ->thoigian=$tg;
        if(isset($request->link)&& isset($request->loaibaomat) && isset($request->thangbaomat)&& isset($request->SDT) ){
            $baomat ->save();
            return redirect()->back()->with('success','Gửi yêu cầu thành công');
        }
        else{
            return redirect()->back()->with('error','Không để trống nội dung');
        }

    }

    function fblikepost()
    {
        return view("user.content.bufflikepost");
    }
    function postfblikepost(Request $request)
    {
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $bufflikepost = new Buff_like_post();
        $bufflikepost->link=$request->link;
        $bufflikepost->soluong=$request->sl;
        $bufflikepost->dongia=$request->dongia;
        $bufflikepost->camxuc=$request->camxuc;
        $bufflikepost->thanhtien=$request->thanhtien;
        $bufflikepost->ID_chucnang="19";
        $bufflikepost->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $bufflikepost->thoigian=$tg;
        $bufflikepost->ID_user="1";
        $bufflikepost->trangthai="1";
        if(isset($request->link)&& isset($request->sl)&& isset($request->camxuc) && isset($request->dongia) ){
            $bufflikepost->save();
             return redirect()->back()->with('success','Gửi yêu cầu thành công');
        }
        else{
            return redirect()->back()->with('error','Không để trống nội dung');
        }

    }
    function fbsub()
    {
        return view("user.content.buffsub");
    }
    function postfbsub(Request $request)
    {
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $buffsub = new Buff_sub();
        $buffsub->link=$request->link;
        $buffsub->soluong=$request->sl;
        $buffsub->dongia=$request->dongia;
        $buffsub->thanhtien=$request->thanhtien;
        $buffsub->ID_chucnang="20";
        $buffsub->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $buffsub->thoigian=$tg;
        $buffsub->ID_user="1";
        $buffsub->trangthai="1";
        if(isset($request->link)&& isset($request->sl) && isset($request->dongia) ){
            $buffsub->save();
             return redirect()->back()->with('success','Gửi yêu cầu thành công');
        }
        else{
            return redirect()->back()->with('error','Không để trống nội dung');
        }

    }
    function fbfanpage()
    {
        return view("user.content.bufffanpage");
    }
    function postfbfanpage(Request $request)
    {
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $bufffanpage = new Buff_fanpage();
        $bufffanpage->link=$request->link;
        $bufffanpage->soluong=$request->sl;
        $bufffanpage->dongia=$request->dongia;
        $bufffanpage->thanhtien=$request->thanhtien;
        $bufffanpage->ID_chucnang="21";
        $bufffanpage->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $bufffanpage->thoigian=$tg;
        $bufffanpage->ID_user="1";
        $bufffanpage->trangthai="1";
        if(isset($request->link)&& isset($request->sl) && isset($request->dongia) ){
            $bufffanpage->save();
             return redirect()->back()->with('success','Gửi yêu cầu thành công');
        }
        else{
            return redirect()->back()->with('error','Không để trống nội dung');
        }

    }
    function fbcmt()
    {
        return view("user.content.buffcmt");
    }
    function postfbcmt(Request $request)
    {
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $buffcmt = new Buff_cmt();
        $buffcmt->link=$request->link;
        $buffcmt->soluong='0';
        $buffcmt->dongia=$request->dongia;
        $buffcmt->noidung=$request->noidung;
        $buffcmt->thanhtien='0';
        $buffcmt->ID_chucnang="22";
        $buffcmt->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $buffcmt->thoigian=$tg;
        $buffcmt->ID_user="1";
        $buffcmt->trangthai="1";
        if(isset($request->link)&& isset($request->noidung) && isset($request->dongia) ){
            $buffcmt->save();
             return redirect()->back()->with('success','Gửi yêu cầu thành công');
        }
        else{
            return redirect()->back()->with('error','Không để trống nội dung');
        }

    }
    function fbshare()
    {
        return view("user.content.buffshare");
    }
    function postfbshare(Request $request)
    {
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $buffshare = new Buff_share();
        $buffshare->link=$request->link;
        $buffshare->soluong=$request->sl;
        $buffshare->dongia=$request->dongia;
        $buffshare->thanhtien=$request->thanhtien;
        $buffshare->ID_chucnang="23";
        $buffshare->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $buffshare->thoigian=$tg;
        $buffshare->ID_user="1";
        $buffshare->trangthai="1";
        if(isset($request->link)&& isset($request->sl) && isset($request->dongia) ){
            $buffshare->save();
             return redirect()->back()->with('success','Gửi yêu cầu thành công');
        }
        else{
            return redirect()->back()->with('error','Không để trống nội dung');
        }

    }
    function instalike()
    {
        return view("user.content.instalike");
    }
    function postinstalike(Request $request)
    {
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $instalike = new Insta_like();
        $instalike->link=$request->link;
        $instalike->soluong=$request->sl;
        $instalike->dongia=$request->dongia;
        $instalike->thanhtien=$request->thanhtien;
        $instalike->ID_chucnang="1";
        $instalike->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $instalike->thoigian=$tg;
        $instalike->ID_user="1";
        $instalike->trangthai="1";
        if(isset($request->link)&& isset($request->sl) && isset($request->dongia) ){
            $instalike->save();
             return redirect()->back()->with('success','Gửi yêu cầu thành công');
        }
        else{
            return redirect()->back()->with('error','Không để trống nội dung');
        }

    }
    function instafl()
    {
        return view("user.content.instafl");
    }
    function postinstafl(Request $request)
    {
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $instafl = new Insta_follow();
        $instafl->link=$request->link;
        $instafl->soluong=$request->sl;
        $instafl->dongia=$request->dongia;
        $instafl->thanhtien=$request->thanhtien;
        $instafl->ID_chucnang="2";
        $instafl->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $instafl->thoigian=$tg;
        $instafl->ID_user="1";
        $instafl->trangthai="1";
        if(isset($request->link)&& isset($request->sl) && isset($request->dongia) ){
            $instafl->save();
             return redirect()->back()->with('success','Gửi yêu cầu thành công');
        }
        else{
            return redirect()->back()->with('error','Không để trống nội dung');
        }

    }
    function instacmt()
    {
        return view("user.content.instacmt");
    }
    function postinstacmt(Request $request)
    {
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $instacmt = new Insta_cmt();
        $instacmt->link=$request->link;
        $instacmt->soluong='0';
        $instacmt->dongia=$request->dongia;
        $instacmt->noidung=$request->noidung;
        $instacmt->thanhtien='0';
        $instacmt->ID_chucnang="3";
        $instacmt->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $instacmt->thoigian=$tg;
        $instacmt->ID_user="1";
        $instacmt->trangthai="1";
        if(isset($request->link)&& isset($request->noidung) && isset($request->dongia) ){
            $instacmt->save();
             return redirect()->back()->with('success','Gửi yêu cầu thành công');
        }
        else{
            return redirect()->back()->with('error','Không để trống nội dung');
        }

    }
    function viplikemonth()
    {
        return view("user.content.viplikemonth");
    }
    function postviplikemonth(Request $request)
    {
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $viplikemonth = new Vip_like_month();
        $viplikemonth->link=$request->link;
        $viplikemonth->minlike=$request->minlike;
        $viplikemonth->maxlike=$request->maxlike;
        $viplikemonth->slbai=$request->slbai;
        $viplikemonth->slngay=$request->slngay;
        $viplikemonth->dongia=$request->dongia;
        $viplikemonth->thanhtien=$request->thanhtien;
        $viplikemonth->ID_chucnang="5";
        $viplikemonth->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $viplikemonth->thoigian=$tg;
        $viplikemonth->ID_user="1";
        $viplikemonth->trangthai="1";
        if(isset($request->link)&& isset($request->minlike) && isset($request->maxlike) && isset($request->slbai) && isset($request->slngay) && isset($request->dongia) ){
            $viplikemonth->save();
             return redirect()->back()->with('success','Gửi yêu cầu thành công');
        }
        else{
            return redirect()->back()->with('error','Không để trống nội dung');
        }

    }
}