<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insta_follow extends Model
{
    protected $table = "insta_follow";
    protected $fillable =['link','soluong','dongia','ID_chucnang','ghichu','thanhtien','thoigian','ID_user','trangthai'];
    public $timestamps=false;
}
