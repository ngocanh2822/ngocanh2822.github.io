<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Muaban extends Model
{
    protected $table = "chucnang_muaban";
    protected $fillable =['loainick','SL','SDT','ghichu','ID_chucnang','thoigian','ID_user'];
    public $timestamps=false;
}
