<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
<<<<<<< HEAD
    public function naptien($id_user,$tiennap){

=======
    public function thanhtoan($id_user,$tongtien){
    	$this->where('id',$id_user)->update(['user_money'=>$tongtien]);
    }
    public function naptien($id_user,$naptien){
>>>>>>> a6f0899b25864bf063472d05b7731f6a451a222c
    	$user = $this->find($id_user);
        $money = $user->user_money + $tiennap;
        $this->where('id',$id_user)->update(['user_money'=>$money]);
    }
}
