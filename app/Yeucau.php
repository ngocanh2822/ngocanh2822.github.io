<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yeucau extends Model
{
    //
    protected $table = 'yeucau';
    public $timestampt = false;
    public function get_newlist(){
    	return $this->select('yeucau.*','type_chucnang.chucnang_name','users.name')->where('trangthai',1)->leftJoin('type_chucnang', 'yeucau.ID_chucnang', '=', 'type_chucnang.ID_chucnang')->leftJoin('users', 'users.id', '=', 'yeucau.ID_user')->orderBy('updated_at','DESC')->paginate(10);
    }
    public function hoanthanh($id){
    	$this->where('id',$id)->update(['trangthai'=>0]);
    }
}
