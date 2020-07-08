<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vip_like_mount extends Model
{
    protected $table = "vip_like_mount";
    protected $fillable =['link','minlike','maxlike','slbai','dongia','ID_chucnang','ghichu','thanhtien','thoigian','ID_user','trangthai'];
    public $timestamps=false;
}
