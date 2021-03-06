<?php

namespace App\Http\Controllers;

use App\Users;
use App\Naptien;
use Illuminate\Http\Request;
use Alert;
use Auth;
class NaptienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = new Users;
        $naptien = $user->get_userlist();
        return view('admin.pages.naptien',compact('naptien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $users,$naptien)
    {
        //
        $nt = new Naptien;
        $us = new Users;

        $tiennap = $request->tien;
        $noidung = isset($request->noidung) ? $request->noidung : 'Nạp tiền vào tài khoản';
        if(is_null($tiennap) || $tiennap == 0){
            Alert::error('Error','Số tiền không được để trống và phải khác 0');
            return redirect()->back();
        }
        $id = $naptien;
        
        $us->naptien($id,$tiennap);

        $nt->create($id,$tiennap,$noidung);
        Alert::success('Complete','Đã nạp');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $users)
    {
        //
    }
}
