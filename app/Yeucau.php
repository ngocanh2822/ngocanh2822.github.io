<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yeucau extends Model
{
<<<<<<< HEAD

    protected $table = 'yeucau';
    protected $fillable =['ID_chucnang','noidung','sdt','ghichu','ID_user','trangthai'];
=======
<<<<<<< HEAD
    //
    protected $table = 'yeucau';
>>>>>>> 14ea528931543301bec3cddc7ca7bbc1ee2b8726
    public $timestampt = false;
    public function get_newlist(){
    	return $this->select('yeucau.*','type_chucnang.chucnang_name','users.name')->where('trangthai',1)->leftJoin('type_chucnang', 'yeucau.ID_chucnang', '=', 'type_chucnang.ID_chucnang')->leftJoin('users', 'users.id', '=', 'yeucau.ID_user')->orderBy('updated_at','DESC')->paginate(10);
    }
    public function hoanthanh($id){
    	$this->where('id',$id)->update(['trangthai'=>0]);
    }
<<<<<<< HEAD
    
=======
=======
    protected $table = 'yeucau';
    protected $timestampt = false;
    protected $fillable =['ID_chucnang','noidung','sdt','ghichu','ID_user','trangthai'];
>>>>>>> a6f0899b25864bf063472d05b7731f6a451a222c
>>>>>>> 14ea528931543301bec3cddc7ca7bbc1ee2b8726
}
