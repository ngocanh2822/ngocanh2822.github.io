<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baomat extends Model
{
    protected $table = "chucnang_baomat";
    protected $fillable =['link','loaibaomat','thangbaomat','SDT','ghichu','ID_chucnang','thoigian','ID_user','trangthai'];
    public $timestamps=false;
}
