<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buff_cmt extends Model
{
    protected $table = "buff_cmt";
    protected $fillable =['link','soluong','dongia','noidung','ID_chucnang','ghichu','thanhtien','thoigian','ID_user','trangthai'];
    public $timestamps=false;
}
