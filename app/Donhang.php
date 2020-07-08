<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donhang extends Model
{
    protected $table = 'donhang';
    protected $timestampt = false;
    protected $fillable =['ID_chucnang','thoigianorder','noidung','tongtien','ghichu','ID_user','trangthai'];
    public function get_newlist(){
    	return $this->where('trangthai',0)->leftJoin('type_chucnang', 'donhang.ID_chucnang', '=', 'type_chucnang.ID_chucnang')->paginate(10);
    }
    
}
