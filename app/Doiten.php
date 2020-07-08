<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doiten extends Model
{
    protected $table = "chucnang_doiten";
    protected $fillable =['link','tendoi','SDT','ghichu','ID_chucnang','thoigian','ID_user','trangthai'];
    public $timestamps=false;
}
