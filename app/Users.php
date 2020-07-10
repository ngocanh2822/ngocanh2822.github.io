<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Users extends Model
{
    protected $table = "users";
    public $timestampt = false;
    protected $fillable = [
        'name', 'email', 'password','level','user_money'
    ];
    public function get_userlist(){
    	return $this->where('level',0)->paginate(10);
    }

    public function thanhtoan($id_user,$tongtien){
    	$this->where('id',$id_user)->update(['user_money'=>$tongtien]);
    }
    public function naptien($id_user,$naptien){
    	$user = $this->find($id_user);
        $money = $user->user_money + $tiennap;
        $this->where('id',$id_user)->update(['user_money'=>$money]);
    }
    public function update_admin($id,$array){
            $this->where('id',$id)->update($array);
    }
}
