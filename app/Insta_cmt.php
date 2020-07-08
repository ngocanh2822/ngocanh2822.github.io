<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insta_cmt extends Model
{
    protected $table = "insta_cmt";
    protected $fillable =['link','soluong','dongia','noidung','ID_chucnang','ghichu','thanhtien','thoigian','ID_user','trangthai'];
    public $timestamps=false;
}
