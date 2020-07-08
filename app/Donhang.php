<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donhang extends Model
{
    protected $table = 'donhang';
    protected $timestampt = false;
    public function get_newlist(){
    	return $this->where('trangthai',0)->leftJoin('type_chucnang', 'donhang.ID_chucnang', '=', 'type_chucnang.ID_chucnang')->paginate(10);
    }
}
