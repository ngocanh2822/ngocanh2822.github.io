<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donhang extends Model
{
    protected $table = 'donhang';
    protected $timestampt = false;
    protected $fillable =['ID_chucnang','thoigianorder','noidung','tongtien','ghichu','ID_user','trangthai'];
    public function get_newlist(){
    	return $this->where('trangthai',1)->leftJoin('type_chucnang', 'donhang.ID_chucnang', '=', 'type_chucnang.ID_chucnang')->orderBy('thoigianorder','DESC')->paginate(10);
    }
    public function hoanthanh($id){
    	$this->where('ID',$id)->update(['trangthai'=>0]);
    }
    public function listcomplete(){
    	return $this->where('trangthai',0)->leftJoin('type_chucnang', 'donhang.ID_chucnang', '=', 'type_chucnang.ID_chucnang')->orderBy('thoigianorder','DESC')->paginate(10);
    }
}
