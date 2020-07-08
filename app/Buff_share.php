<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buff_share extends Model
{
    protected $table = "buff_share";
    protected $fillable =['link','soluong','dongia','ID_chucnang','ghichu','thanhtien','thoigian','ID_user','trangthai'];
    public $timestamps=false;
}
