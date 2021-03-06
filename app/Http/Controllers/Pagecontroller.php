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
use App\Yeucau;
use App\Naptien;
use Auth;
Use Alert;
use Illuminate\Support\Facades\Validator;
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
    function getRegister()
    {
        if (Auth::check() && Auth::user()->level==0) {
            return redirect()->route('dichvu');
        }
        if (Auth::check() && Auth::user()->level==1) {
            return redirect()->route('donhang.index');
        }
        return view("user.layouts.register");
    }
    // function postLogin()
    // {
    //     $chucnang = Type_chucnang::all();
    //     return view("user.content.trangchu",compact('chucnang'));
    // }
    function getDichvu()
    {
        $id = Auth::user()->id;
    	$chucnang = Type_chucnang::all();
        $lichsu = Naptien::where('ID_user',$id)->orderBy('thoigian','desc')->get();
    	return view("user.content.trangchu",compact('chucnang','lichsu'));
    }
    function getuserhistory()
    {
        $id = Auth::user()->id;
        $donhang = Donhang::where('ID_user',$id)->orderBy('thoigianorder','desc')->paginate(10);
        $chucnang = Type_chucnang::all();
        return view("user.content.lichsu",compact('donhang','chucnang'));
    }
    function getuserpayment()
    {
        $id = Auth::user()->id;

        $user_money = Auth::user()->user_money;  
        $j = 0;
            $n = strlen($user_money)-1;
            for ($l=$n; $l >=0; $l--) { 
                $j++;
                if ($j%3 == 0 && $j != $n+1) {
                    $user_money = substr($user_money, 0, $l) . "." . substr($user_money, $l);
                }
            }

        $lichsu = Naptien::where('ID_user',$id)->orderBy('thoigian','desc')->paginate(10);
        return view("user.content.naptien",compact('user_money','lichsu'));

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
        $name = Auth::user()->name;
        $hoten = isset($request->hoten) ? $request->hoten : Auth::user()->hoten;
        $email = isset($request->email) ? $request->email : Auth::user()->email;
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
            if(Auth::attempt(['name'=>$name,'password'=>$mkc]) && $mkm1 == $mkm2)
            {
                $password = bcrypt($mkm1);
                User::where('id', $id)
                ->update(['password'=>$password,'hoten'=>$hoten,'email'=>$email,'user_sdt'=>$user_sdt,'user_fbid'=>$user_fbid]);
 
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
        $yeucau = new Yeucau();
        $yeucau->SDT=$request->SDT;
        $yeucau->ID_chucnang="9";
        $yeucau->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $yeucau->ID_user= $id;
        $yeucau->trangthai="1";
        if(isset($request->loainick) && isset($request->SL) && isset($request->SDT))
        {
            $noidung = "Loại nick: ".$request->loainick."<br/> Số lượng Sub/Like: ".$request->SL;
            $yeucau->noidung= $noidung;
            $yeucau->save();
            Alert::success('Thành công!', 'Gửi yêu cầu thành công, chúng tôi sẽ sớm liên hệ với bạn.');
            return redirect()->back();
        }
        else{
            Alert::error('Lỗi!', 'Không để trống nội dung');
            return redirect()->back()->withInput();
        }

    }
    function postfbripnick(Request $request)
    {
        $id = Auth::user()->id;
        $yeucau = new Yeucau();  
        $yeucau->SDT=$request->SDT;
        $yeucau->ID_chucnang="10";
        $yeucau->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $yeucau->ID_user=$id;
        $yeucau->trangthai="1";
        if(isset($request->link)&& isset($request->loairip)&& isset($request->loaithoigian) && isset($request->SDT) )
        {
            $noidung = "Link: ".$request->link."<br/> Loại Rip: ".$request->loairip."<br/> Thời gian: ".$request->loaithoigian;
            $yeucau->noidung= $noidung;
            $yeucau->save();
            Alert::success('Thành công!', 'Gửi yêu cầu thành công, chúng tôi sẽ sớm liên hệ với bạn.');
            return redirect()->back();
        }
        else{
            Alert::error('Lỗi!', 'Không để trống nội dung');
            return redirect()->back()->withInput();
        }

    }
     function postfbrename(Request $request)
    {
        $id = Auth::user()->id;  
        $yeucau = new Yeucau();  
        $yeucau->SDT=$request->SDT;
        $yeucau->ID_chucnang="11";
        $yeucau->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $yeucau->ID_user= $id;
        $yeucau->trangthai="1";
        if(isset($request->link)&& isset($request->tendoi)&& isset($request->SDT) )
        {
            $noidung = "Link: ".$request->link."<br/> Tên cần đổi: ".$request->tendoi;
            $yeucau->noidung= $noidung;
            $yeucau->save();
            Alert::success('Thành công!', 'Gửi yêu cầu thành công, chúng tôi sẽ sớm liên hệ với bạn.');
            return redirect()->back();
        }
        else{
            Alert::error('Lỗi!', 'Không để trống nội dung');
            return redirect()->back()->withInput();
        }

    }
     function postfbsecurity(Request $request)
    {
        $id = Auth::user()->id;  
        $yeucau = new Yeucau();
        $yeucau ->SDT=$request->SDT;
        $yeucau ->ID_chucnang="12";
        $yeucau ->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $yeucau->ID_user=$id;
        $yeucau->trangthai="1";
        if(isset($request->link)&& isset($request->loaibaomat) && isset($request->thangbaomat)&& isset($request->SDT) )
        {
            $noidung = "Link: ".$request->link."<br/> Loại bảo mật: ".$request->loaibaomat."<br/> Số tháng cần bảo vệ: ".$request->thangbaomat;
            $yeucau->noidung= $noidung;
            $yeucau ->save();
            Alert::success('Thành công!', 'Gửi yêu cầu thành công, chúng tôi sẽ sớm liên hệ với bạn.');
            return redirect()->back();
        }
        else{
            Alert::error('Lỗi!', 'Không để trống nội dung');
            return redirect()->back()->withInput();
        }

    }

    function fblikepost()
    {
        return view("user.content.bufflikepost");
    }
    function postfblikepost(Request $request)
    {
        $messages = [
            'sl.min' => 'Số lượng phải lớn hơn :min.',
            'dongia.min' => 'Đơn giá phải lớn hơn :min.',
        ];
        $rules = ([
            'sl' => 'min:100',
            'dongia' => 'min:40',
        ]);

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $id = Auth::user()->id;
        $money  = Auth::user()->user_money;
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $donhang = new Donhang();
        $donhang->ID_chucnang="19";
        $donhang->thoigianorder=$tg;
        $donhang->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $donhang->ID_user=$id;
        $donhang->trangthai="1";
        if(isset($request->link)&& isset($request->sl)&& isset($request->camxuc) && isset($request->dongia) )
        {
                $noidung = "Link: ".$request->link."<br/> Cảm xúc: ".$request->camxuc."<br/> Số lượng: ".$request->sl."<br/> Đơn giá: ".$request->dongia;
                $donhang->tongtien=$request->sl*$request->dongia;
                $donhang->noidung= $noidung;
            if($donhang->tongtien <= $money  )
            {
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
        $messages = [
            'sl.min' => 'Số lượng phải lớn hơn :min.',
            'dongia.min' => 'Đơn giá phải lớn hơn :min.',
        ];
        $rules = ([
            'sl' => 'min:100',
            'dongia' => 'min:40',
        ]);

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

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
                $noidung = "Link: ".$request->link."<br/> Số lượng: ".$request->sl."<br/> Đơn giá: ".$request->dongia ;
                $donhang->tongtien=$request->sl*$request->dongia;
                $donhang->noidung= $noidung;
            if($donhang->tongtien <= $money  )
            {
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
        $messages = [
            'sl.min' => 'Số lượng phải lớn hơn :min.',
            'dongia.min' => 'Đơn giá phải lớn hơn :min.',
        ];
        $rules = ([
            'sl' => 'min:100',
            'dongia' => 'min:40',
        ]);

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $id = Auth::user()->id;  
        $money  = Auth::user()->user_money;
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $donhang = new Donhang();
        $donhang->ID_chucnang="21";
        $donhang->thoigianorder=$tg;
        $donhang->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $donhang->ID_user=$id;
        $donhang->trangthai="1";
        if(isset($request->link)&& isset($request->sl) && isset($request->dongia) )
        {
                $noidung = "Link: ".$request->link."<br/> Số lượng: ".$request->sl."<br/> Đơn giá: ".$request->dongia ;
                $donhang->tongtien=$request->sl*$request->dongia;
                $donhang->noidung= $noidung;
            if($donhang->tongtien <= $money  )
            {
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
        $messages = [
            'sl.min' => 'Số lượng phải lớn hơn :min.',
            'dongia.min' => 'Đơn giá phải lớn hơn :min.',
        ];
        $rules = ([
            'sl' => 'min:100',
            'dongia' => 'min:500',
        ]);

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $id = Auth::user()->id;  
        $money  = Auth::user()->user_money;
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $donhang = new Donhang();
        $donhang->ID_chucnang="22";
        $donhang->thoigianorder=$tg;
        $donhang->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $donhang->ID_user=$id;
        $donhang->trangthai="1";
        if(isset($request->link)&& isset($request->noidung) && isset($request->dongia) )
        {
                $noidung = "Link: ".$request->link."<br/> Số lượng: ".$request->sl."<br/> Đơngiá: ".$request->dongia."<br/> Nội dung cmt: ".$request->nd;
                $donhang->tongtien=$request->sl*$request->dongia;
                $donhang->noidung= $noidung;
            if($donhang->tongtien <= $money  )
            {
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
        $messages = [
            'sl.min' => 'Số lượng phải lớn hơn :min.',
            'dongia.min' => 'Đơn giá phải lớn hơn :min.',
        ];
        $rules = ([
            'sl' => 'min:100',
            'dongia' => 'min:1000',
        ]);

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
           
        $id = Auth::user()->id; 
        $money  = Auth::user()->user_money; 
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $donhang = new Donhang();
        $donhang->ID_chucnang="23";
        $donhang->thoigianorder=$tg;
        $donhang->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $donhang->ID_user=$id;
        $donhang->trangthai="1";
        if(isset($request->link)&& isset($request->sl) && isset($request->dongia) )
        {
                $noidung = "Link: ".$request->link."<br/> Số lượng: ".$request->sl."<br/> Đơn giá: ".$request->dongia ;
                $donhang->tongtien=$request->sl*$request->dongia;
                $donhang->noidung= $noidung;
            if($donhang->tongtien <= $money  )
            {
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
        $messages = [
            'sl.min' => 'Số lượng phải lớn hơn :min.',
            'dongia.min' => 'Đơn giá phải lớn hơn :min.',
        ];
        $rules = ([
            'sl' => 'min:100',
            'dongia' => 'min:70',
        ]);

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $id = Auth::user()->id;  
        $money  = Auth::user()->user_money; 
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $donhang = new Donhang();
        $donhang->ID_chucnang="1";
        $donhang->thoigianorder=$tg;
        $donhang->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $donhang->ID_user=$id;
        $donhang->trangthai="1";
        if(isset($request->link)&& isset($request->sl) && isset($request->dongia) )
        {
                $noidung = "Link: ".$request->link."<br/> Số lượng: ".$request->sl."<br/> Đơn giá: ".$request->dongia ;
                $donhang->tongtien=$request->sl*$request->dongia;
                $donhang->noidung= $noidung;
            if($donhang->tongtien <= $money  )
            {
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
        $messages = [
            'sl.min' => 'Số lượng phải lớn hơn :min.',
            'dongia.min' => 'Đơn giá phải lớn hơn :min.',
        ];
        $rules = ([
            'sl' => 'min:100',
            'dongia' => 'min:150',
        ]);

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $id = Auth::user()->id; 
        $money  = Auth::user()->user_money;  
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $donhang = new Donhang();
        $donhang->ID_chucnang="2";
        $donhang->thoigianorder=$tg;
        $donhang->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $donhang->ID_user=$id;
        $donhang->trangthai="1";
        if(isset($request->link)&& isset($request->sl) && isset($request->dongia) )
        {
                $noidung = "Link: ".$request->link."<br/> Số lượng: ".$request->sl."<br/> Đơn giá: ".$request->dongia ;
                $donhang->tongtien=$request->sl*$request->dongia;
                $donhang->noidung= $noidung;
            if($donhang->tongtien <= $money  )
            {
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
        $messages = [
            'sl.min' => 'Số lượng phải lớn hơn :min.',
            'dongia.min' => 'Đơn giá phải lớn hơn :min.',
        ];
        $rules = ([
            'sl' => 'min:100',
            'dongia' => 'min:1000',
        ]);

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $id = Auth::user()->id;  
        $money  = Auth::user()->user_money;  
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $donhang = new Donhang();
        $donhang->ID_chucnang="3";
        $donhang->thoigianorder=$tg;
        $donhang->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $donhang->ID_user= $id;
        $donhang->trangthai="1";
        if(isset($request->link)&& isset($request->noidung) && isset($request->dongia) )
        {
                $noidung = "Link: ".$request->link."<br/> Số lượng: ".$request->sl."<br/> Đơngiá: ".$request->dongia."<br/> Nội dung cmt: ".$request->noidung;
                $donhang->tongtien=$request->sl*$request->dongia;
                $donhang->noidung= $noidung;
            if($donhang->tongtien <= $money  )
            {
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
        $messages = [
            'minlike.min' => 'Số lượng like nhỏ nhất phải lớn hơn :min.',
            'maxlike.min' => 'Số lượng like lớn nhất phải lớn hơn :min.',
            'slbai.min' => 'Số lượng bài viết phải lớn hơn :min.',
            'slngay.min' => 'Số ngày phải lớn hơn :min.',
            'dongia.min' => 'Đơn giá lớn hơn :min.',
        ];
        $rules = ([
            'minlike' => 'min:40',
            'maxlike' => 'min:50',
            'slbai' => 'min:1',
            'slngay' => 'min:1',
            'dongia' => 'min:30',
        ]);

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $id = Auth::user()->id;  
        $money  = Auth::user()->user_money; 
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $donhang = new Donhang();
        $donhang->ID_chucnang="5";
        $donhang->thoigianorder=$tg;
        $donhang->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $donhang->ID_user=$id;
        $donhang->trangthai="1";
        if(isset($request->link)&& isset($request->minlike) && isset($request->maxlike) && isset($request->slbai) && isset($request->slngay) && isset($request->dongia) )
        {
                $noidung = "Link: ".$request->link."<br/> Minlike: ".$request->minlike."<br/> Maxlike: ".$request->maxlike."<br/> Số lượng bài: ".$request->slbai."<br/> Số lượng ngày: ".$request->slngay."<br/> Đơn giá: ".$request->dongia ;
                $donhang->tongtien=$request->slbai*$request->dongia*$request->slngat*$request->maxlike;
                $donhang->noidung= $noidung;
            if($donhang->tongtien <= $money  )
            {
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
        $messages = [
            'minlike.min' => 'Số lượng like nhỏ nhất phải lớn hơn :min.',
            'maxlike.min' => 'Số lượng like lớn nhất phải lớn hơn :min.',
            'slbai.min' => 'Số lượng bài viết phải lớn hơn :min.',
            'slngay.min' => 'Số ngày phải lớn hơn :min.',
            'dongia.min' => 'Đơn giá lớn hơn :min.',
        ];
        $rules = ([
            'minlike' => 'min:40',
            'maxlike' => 'min:50',
            'slbai' => 'min:1',
            'slngay' => 'min:1',
            'dongia' => 'min:30',
        ]);

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $id = Auth::user()->id;  
        $money  = Auth::user()->user_money; 
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $donhang = new Donhang();
        $donhang->ID_chucnang="6";
        $donhang->thoigianorder=$tg;
        $donhang->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $donhang->ID_user= $id;
        $donhang->trangthai="1";
        if(isset($request->link)&& isset($request->minlike) && isset($request->maxlike) && isset($request->slbai)&& isset($request->dongia) )
        {
                $noidung = "Link: ".$request->link."<br/> Minlike: ".$request->minlike."<br/> Maxlike: ".$request->maxlike."<br/> Số lượng bài: ".$request->slbai."<br/> Đơn giá: ".$request->dongia ;
                $donhang->tongtien=$request->slbai *$request->maxlike*$request->dongia;
                $donhang->noidung= $noidung;
            if($donhang->tongtien <= $money  )
            {
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
    function vipcmtmonth()
    {
        return view("user.content.vipcmtmonth");
    }
    function postvipcmtmonth(Request $request)
    {
        $messages = [
            'mincmt.min' => 'Số lượng comment nhỏ nhất phải lớn hơn :min.',
            'maxcmt.min' => 'Số lượng comment lớn nhất phải lớn hơn :min.',
            'slbai.min' => 'Số lượng bài viết phải lớn hơn :min.',
            'slngay.min' => 'Số ngày phải lớn hơn :min.',
            'dongia.min' => 'Đơn giá lớn hơn :min.',
        ];
        $rules = ([
            'mincmt' => 'min:40',
            'maxcmt' => 'min:40',
            'slbai' => 'min:1',
            'slngay' => 'min:1',
            'dongia' => 'min:50',
        ]);

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $id = Auth::user()->id;  
        $money  = Auth::user()->user_money; 
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $donhang = new Donhang();
        $donhang->ID_chucnang="8";
        $donhang->thoigianorder=$tg;
        $donhang->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $donhang->ID_user= $id;
        $donhang->trangthai="1";
        if(isset($request->link)&& isset($request->mincmt) && isset($request->maxcmt) && isset($request->slbai)&& isset($request->slngay)&& isset($request->dongia) )
        {
                $noidung = "Link: ".$request->link."<br/> Mincmt: ".$request->mincmt."<br/> Maxcmt: ".$request->maxcmt."<br/> Số lượng bài: ".$request->slbai."<br/> Số lượng ngày mua VIP: ".$request->slngay."<br/> Đơn giá: ".$request->dongia."<br/> Nội dung: ".$request->nd ;
                $donhang->tongtien=$request->maxcmt*$request->slbai*$request->slngay*$request->dongia;
                $donhang->noidung= $noidung;
            if($donhang->tongtien <= $money  )
            {
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
                return redirect()->back()->withInput();
            }
        }
        else{
            Alert::error('Lỗi!', 'Không để trống nội dung');
            return redirect()->back()->withInput();
        }

    }
    function vipreactionmonth()
    {
        return view("user.content.vipreactionmonth");
    }
    function postvipreactionmonth(Request $request)
    {
        $messages = [
            'minlike.min' => 'Số lượng nhỏ nhất phải lớn hơn :min.',
            'maxlike.min' => 'Số lượng lớn nhất phải lớn hơn :min.',
            'minlove.min' => 'Số lượng nhỏ nhất phải lớn hơn :min.',
            'maxlove.min' => 'Số lượng lớn nhất phải lớn hơn :min.',
            'minwow.min' => 'Số lượng nhỏ nhất phải lớn hơn :min.',
            'maxwow.min' => 'Số lượng lớn nhất phải lớn hơn :min.',
            'minsad.min' => 'Số lượng nhỏ nhất phải lớn hơn :min.',
            'maxsad.min' => 'Số lượng lớn nhất phải lớn hơn :min.',
            'minhaha.min' => 'Số lượng nhỏ nhất phải lớn hơn :min.',
            'maxhaha.min' => 'Số lượng lớn nhất phải lớn hơn :min.',
            'slbai.min' => 'Số lượng bài viết phải lớn hơn :min.',
            'slngay.min' => 'Số ngày phải lớn hơn :min.',
            'dongia.min' => 'Đơn giá lớn hơn :min.',
        ];
        $rules = ([
            'minlike' => 'min:40',
            'maxlike' => 'min:50',
            'minlove' => 'min:40',
            'maxlove' => 'min:50',
            'minhaha' => 'min:40',
            'maxhaha' => 'min:50',
            'minwow' => 'min:40',
            'maxwow' => 'min:50',
            'minsad' => 'min:40',
            'maxsad' => 'min:50',
            'slbai' => 'min:1',
            'slngay' => 'min:1',
            'dongia' => 'min:30',
        ]);

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $id = Auth::user()->id;  
        $money  = Auth::user()->user_money; 
        $tg = Carbon::now('Asia/Ho_Chi_Minh');
        $donhang = new Donhang();
        $donhang->ID_chucnang="8";
        $donhang->thoigianorder=$tg;
        $donhang->ghichu = isset($request->ghichu) ? $request->ghichu : "";
        $donhang->ID_user= $id;
        $donhang->trangthai="1";
        if (isset($request->maxlike))
        {
            $minlike = $request->minlike ? $request->minlike : "0";
            $maxlike = $request->maxlike;
            $ndlike =" <br/> Minlike: ". $request->minlike." Maxlike: ".$request->maxlike;
        } 
        else
        {
            $maxlike =0;
            $ndlike ="";
        } 
        if (isset($request->maxlove))
        {
            $minlove = $request->minlove ? $request->minlove : "0";
            $maxlove = $request->maxlove;
            $ndlove =" <br/> Minlove: ". $request->minlove." Maxlove: ".$request->maxlove;
        } 
        else
        {
            $maxlove =0;
            $ndlove ="";
        } 
        if (isset($request->maxhaha))
        {
            $minhaha = $request->minhaha ? $request->minhaha : "0";
            $maxhaha = $request->maxhaha;
            $ndhaha =" <br/> Minhaha: ". $request->minhaha." Maxhaha: ".$request->maxhaha;
        } 
        else
        {
            $maxhaha =0;
            $ndhaha ="";
        } 
        if (isset($request->maxsad))
        {
            $minsad = $request->minsad ? $request->minsad : "0";
            $maxsad = $request->maxsad;
            $ndsad =" <br/> Minsad: ". $request->minsad." Maxsad: ".$request->maxsad;
        } 
        else
        {
            $maxsad =0;
            $ndsad ="";
        } 
        if (isset($request->maxwow ))
        {
            $minwow  = $request->minwow  ? $request->minwow  : "0";
            $maxwow  = $request->maxwow ;
            $ndwow  =" <br/> Minwow : ". $request->minwow ." Maxwow : ".$request->maxwow ;
        } 
        else
        {
            $maxwow  =0;
            $ndwow ="";
        } 
        if(isset($request->link) && isset($request->slbai)&& isset($request->slngay) )
        {
                $noidung = "Link: ".$request->link.$ndlike.$ndlove.$ndhaha.$ndsad.$ndwow."<br/> Số lượng bài: ".$request->slbai."<br/> Số lượng ngày mua VIP: ".$request->slngay;
                $donhang->tongtien = ($maxlike*30 +($maxlove + $maxwow + $maxhaha + $maxsad)*80) * $request->slbai * $request->slngay;
                $donhang->noidung= $noidung;
            if($donhang->tongtien <= $money  )
            {
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
                return redirect()->back()->withInput();
            }
        }
        else{
            Alert::error('Lỗi!', 'Không để trống nội dung');
            return redirect()->back()->withInput();
        }

    }

}