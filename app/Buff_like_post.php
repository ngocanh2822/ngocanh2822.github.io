<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buff_like_post extends Model
{
    protected $table = "buff_like_post";
    protected $fillable =['link','camxuc','soluong','dongia','ID_chucnang','ghichu','thanhtien','thoigian','ID_user','trangthai'];
    public $timestamps=false;
}
