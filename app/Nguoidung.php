<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nguoidung extends Model
{
    protected $table = "user";
    protected $fillable =['user_name','password','user_money','user_email','user_hoten','user_sdt','user_fbid'];
    public $timestamps=false;
}
