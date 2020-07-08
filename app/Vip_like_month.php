<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vip_like_month extends Model
{
    protected $table = "vip_like_month";
    protected $fillable =['link','minlike','maxlike','slbai','slngay','dongia','ID_chucnang','ghichu','thanhtien','thoigian','ID_user','trangthai'];
    public $timestamps=false;
}
