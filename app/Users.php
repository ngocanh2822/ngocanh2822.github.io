<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";
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
    	dd($id_user);
    }
}
