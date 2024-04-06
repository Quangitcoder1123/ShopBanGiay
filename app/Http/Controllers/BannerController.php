<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('banner.view',  compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file = $request -> file('ban_image');
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $file->move('images/banners', $fileName);

        Banner::create([
            'ban_image' => $fileName,
            'ban_name'  => $request -> input('ban_name'),
        ]);

        return redirect()->route('admin.banner.index')->with('add_success', trans('admin.message.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($banID)
    {
        $ban = Banner::findOrFail($banID);
        $banners = Banner::all();

        return view('banner.edit', compact('ban', 'banners'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $banID)
    {
        $ban = Banner::findOrFail($banID);

        $file = $request -> file('ban_image');
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $file->move('images/banners', $fileName);

       
            $ban -> ban_image = $fileName;
            $ban -> ban_name  = $request -> input('ban_name');
            $ban -> save();

        return redirect()->route('admin.banner.index')->with('update_success', trans('admin.message.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($banID)
    {
        $ban = Banner::findOrFail($banID);
        $ban -> delete();

        return redirect()->route('admin.banner.index')->with('del_success', trans('admin.message.del_success'));
    }
}
