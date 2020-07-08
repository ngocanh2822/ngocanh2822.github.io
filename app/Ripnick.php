<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ripnick extends Model
{
    protected $table = "chucnang_rip";
    protected $fillable =['link','loairip','loaithoigian','SDT','ghichu','ID_chucnang','thoigian','ID_user','trangthai'];
    public $timestamps=false;
}
