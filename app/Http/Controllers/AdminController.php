<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donhang;
use App\Naptien;
use Auth;
class AdminController extends Controller
{
    function index(){
    	$donhang = new Donhang;
    	$newlist = $donhang->get_newlist();
    	return view('admin.pages.newlist',compact('newlist'));
    }
    public function listcomplete(){
    	$donhang = new Donhang;
    	$donhang = $donhang->listcomplete();
    	return view('admin.pages.hoanthanh',compact('donhang'));
    }
    public function lichsu(){
        $naptien = new Naptien;
        $lichsu = $naptien->get_newlist();
        return view('admin.pages.lichsunaptien',compact('lichsu'));
    }
}
