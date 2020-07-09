<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yeucau extends Model
{
    protected $table = 'yeucau';
    protected $timestampt = false;
    protected $fillable =['ID_chucnang','noidung','sdt','ghichu','ID_user','trangthai'];
}
