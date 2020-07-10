<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Auth;
use DB;
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
    	$list = $this->orderBy('thoigian','DESC')->paginate(10);
        $i = 0;
        foreach ($list as $row) {
            $list[$i] = $row;
            $admin = DB::table('users')->select('users.name')->where('id',$row->ID_admin)->first();
            $list[$i]->admin = $admin->name;
            $user = DB::table('users')->select('users.name')->where('id',$row->ID_user)->first();
            $list[$i]->user = $user->name;
            $i++;
        }
        return $list;
    }
}
