<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Auth;
class Naptien extends Model
{
    //
    protected $table = 'nap_tien';
    public $timestampt = false;
    public function create($ID_user,$sotien,$noidung){
    	$idnap = Auth::user()->id;
    	$thoigian = Carbon::now();
    	$thang =  Carbon::now()->month;
    	$nam =  Carbon::now()->year; 
    	$this->insert(['ID_user'=>$ID_user,'ID_admin'=>$idnap,'sotien'=>$sotien,'noidung'=>$noidung,'thang'=>$thang,'nam'=>$nam,'thoigian'=>$thoigian]);
    }
    public function get_newlist(){
    	return $this->orderBy('thoigian','DESC')->paginate(10);
    }
}
