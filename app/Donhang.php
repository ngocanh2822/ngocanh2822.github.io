<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donhang extends Model
{
<<<<<<< HEAD
    protected $table = 'donhang';
    protected $timestampt = false;
    public function get_newlist(){
    	return $this->where('trangthai',0)->leftJoin('type_chucnang', 'donhang.ID_chucnang', '=', 'type_chucnang.ID_chucnang')->paginate(10);
    }
=======
    protected $table = "donhang";
    protected $fillable =['ID_chucnang','thoigianorder','noidung','tongtien','ghichu','ID_user','trangthai'];
    public $timestamps=false;
>>>>>>> e2b914120d0dfda062e758f1c91cc430b53d0116
}
