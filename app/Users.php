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
<<<<<<< HEAD
=======
<<<<<<< HEAD

    public function thanhtoan($id_user,$tongtien)
    {
    	$this->where('id',$id_user)->update(['user_money'=>$tongtien]);
    }
    public function naptien($id_user,$tiennap)
    {
=======
<<<<<<< HEAD
    public function naptien($id_user,$tiennap){
>>>>>>> 5656ed3cc9ea68db7139eb38309d351fb9659870

    public function thanhtoan($id_user,$tongtien){
    	$this->where('id',$id_user)->update(['user_money'=>$tongtien]);
    }
    public function naptien($id_user,$naptien){
<<<<<<< HEAD
=======
>>>>>>> a6f0899b25864bf063472d05b7731f6a451a222c
>>>>>>> 14ea528931543301bec3cddc7ca7bbc1ee2b8726
>>>>>>> 5656ed3cc9ea68db7139eb38309d351fb9659870
    	$user = $this->find($id_user);
        $money = $user->user_money + $tiennap;
        $this->where('id',$id_user)->update(['user_money'=>$money]);
    }
    public function update_admin($id,$array){
            $this->where('id',$id)->update($array);
    }
}
