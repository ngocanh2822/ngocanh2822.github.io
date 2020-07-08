<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insta_like extends Model
{
    protected $table = "insta_like";
    protected $fillable =['link','soluong','dongia','ID_chucnang','ghichu','thanhtien','thoigian','ID_user','trangthai'];
    public $timestamps=false;
}
