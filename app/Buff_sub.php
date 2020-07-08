<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buff_sub extends Model
{
    protected $table = "buff_sub";
    protected $fillable =['link','soluong','dongia','ID_chucnang','ghichu','thanhtien','thoigian','ID_user','trangthai'];
    public $timestamps=false;
}
