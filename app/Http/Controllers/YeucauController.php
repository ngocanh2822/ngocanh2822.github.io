<?php

namespace App\Http\Controllers;

use App\Yeucau;
use Illuminate\Http\Request;
use Alert;
class YeucauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $yeucau = new Yeucau;
        $datas = $yeucau->get_newlist();
        return view('admin.pages.yeucau',compact('datas'));
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
     * @param  \App\Yeucau  $yeucau
     * @return \Illuminate\Http\Response
     */
    public function show(Yeucau $yeucau)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Yeucau  $yeucau
     * @return \Illuminate\Http\Response
     */
    public function edit(Yeucau $yeucau)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Yeucau  $yeucau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Yeucau $yeucau)
    {
        //
        $yc = new Yeucau;
        $id = $yeucau->ID;
        $yc->hoanthanh($id);
<<<<<<< HEAD
        Alert::success('Complete','Đã hoàn thành.');
=======
        Alert::success('Complete','Đã lưu');
>>>>>>> 14ea528931543301bec3cddc7ca7bbc1ee2b8726
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Yeucau  $yeucau
     * @return \Illuminate\Http\Response
     */
    public function destroy(Yeucau $yeucau)
    {
        //
    }
}
