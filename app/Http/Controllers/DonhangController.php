<?php

namespace App\Http\Controllers;

use App\Donhang;
use Illuminate\Http\Request;
use Auth;
use App\Users;
use Alert;
class DonhangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = new Donhang;
        $donhang = $class->get_newlist();
        return view('admin.pages.donhang',compact('donhang'));
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
     * @param  \App\Donhang  $donhang
     * @return \Illuminate\Http\Response
     */
    public function show(Donhang $donhang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donhang  $donhang
     * @return \Illuminate\Http\Response
     */
    public function edit(Donhang $donhang)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donhang  $donhang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donhang $donhang)
    {
        //
        $dh = new Donhang;
        $dh->hoanthanh($donhang->ID);
        Alert::success('Complete','Đã hoàn thành');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donhang  $donhang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donhang $donhang)
    {
        //
    }
}
