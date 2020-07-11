<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
class Yeucau extends Model
{
    protected $table = 'yeucau';
    public $timestampt = false;
    protected $fillable =['ID_chucnang','noidung','sdt','ghichu','ID_user','trangthai'];
    public function get_newlist(){
    	return $this->select('yeucau.*','type_chucnang.chucnang_name','users.name')->where('trangthai',1)->leftJoin('type_chucnang', 'yeucau.ID_chucnang', '=', 'type_chucnang.ID_chucnang')->leftJoin('users', 'users.id', '=', 'yeucau.ID_user')->orderBy('updated_at','DESC')->paginate(10);
    }
    public function hoanthanh($id){
    	$this->where('id',$id)->update(['trangthai'=>0,'ID_admin'=>Auth::user()->id]);
    }
    public function listcomplete(){

        $tb = $this->where('trangthai',0)->leftJoin('type_chucnang', 'yeucau.ID_chucnang', '=', 'type_chucnang.ID_chucnang')->orderBy('updated_at','DESC')->paginate(10);
        $i=0;
        foreach ($tb as $row) {
            $tb[$i] = $row;
            $user = DB::table('users')->where('id',$row->ID_user)->first();
            $tb[$i]->user = $user->name;
            $ad = DB::table('users')->where('id',$row->ID_admin)->first();
            $tb[$i]->admin = $ad->name;
            $i++;
        }
        return $tb;
    }
}
