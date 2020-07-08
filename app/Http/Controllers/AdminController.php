<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donhang;
use Auth;
class AdminController extends Controller
{
    function index(){
    	$donhang = new Donhang;
    	$newlist = $donhang->get_newlist();
    	return view('admin.pages.newlist',compact('newlist'));
    }
}
