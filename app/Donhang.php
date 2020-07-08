<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donhang extends Model
{
    protected $table = "donhang";
    protected $fillable =['ID_chucnang','thoigianorder','noidung','tongtien','ghichu','ID_user','trangthai'];
    public $timestamps=false;
}
