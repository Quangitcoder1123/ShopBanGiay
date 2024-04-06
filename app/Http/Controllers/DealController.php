<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deal;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deals = Deal::all();
        return view('deal.view', compact('deals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('deal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request -> file('deal_image');
        $fileName = uniqid().'-'.$file->getClientOriginalName();
        $file -> move('images/deal', $fileName);
        
        Deal::create([
            'deal_image' => $fileName,
            'deal_name' => $request -> input('deal_name'),
        ]);
        return redirect()->route('admin.deal.index')->with('add_success', trans('admin.message.add_success'));
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
    public function edit($id)
    {
        $deal = Deal::findOrFail($id);
        $deals = Deal::all();

        return view('deal.edit', compact('deal', 'deals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $deal = Deal::findOrFail($id);

        $file = $request -> file('deal_image');
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $file->move('images/deal', $fileName);

       
            $deal -> deal_image = $fileName;
            $deal -> save();

        return redirect()->route('admin.deal.index')->with('update_success', trans('admin.message.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deal = Deal::findOrFail($id);
        $deal -> delete();

        return redirect()->route('admin.deal.index')->with('del_success', trans('admin.message.del_success'));
    }
}
