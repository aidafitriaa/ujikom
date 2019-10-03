<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pembeli;
use Session;
use Auth;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembeli = pembeli::all();
        return view('admin.pembeli.index',compact('pembeli')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pembeli = pembeli::all();
        return view('admin.pembeli.create',compact('pembeli')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $request->validate([
        //     'nama_pembeli' => 'required|unique:pembelis'
        // ]);
        $pembeli = new pembeli();
        $pembeli->KTP = $request->KTP;
        $pembeli->nama_pembeli = $request->nama_pembeli;
        $pembeli->alamat_pembeli = $request->alamat_pembeli;
        $pembeli->telp_pembeli = $request->telp_pembeli;
        $pembeli->save();
        $response = [
            'success' => true,
            'data' =>  $pembeli,
            'message' => 'Berhasil ditambahkan.'
        ];
        return redirect()->route('pembeli.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pembeli = pembeli::findOrFail($id);
        return view('admin.pembeli.show',compact('pembeli')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembeli = pembeli::findOrFail($id);
        return view('admin.pembeli.edit',compact('pembeli')); 
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
        // $request->validate([
        //     // 'nama_pembeli' => 'required|unique:pembelis'
        // ]);
        $pembeli =  pembeli::findOrFail($id);
        $pembeli->KTP = $request->KTP;
        $pembeli->nama_pembeli = $request->nama_pembeli;
        $pembeli->alamat_pembeli = $request->alamat_pembeli;
        $pembeli->telp_pembeli = $request->telp_pembeli;
        $pembeli->save();
        $response = [
            'success' => true,
            'data' =>  $pembeli,
            'message' => 'Berhasil ditambahkan.'
        ];
        return redirect()->route('pembeli.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembeli = pembeli::findOrfail($id);
        if(!pembeli::destroy($id)) return redirect()->back();
        Session::flash("flash_notification",[
            "level" => "Success",
            "message" => "Berhasil menghapus<b>"
                         . $pembeli->nama_pembeli."</b>"
        ]);
        return redirect()->route('pembeli.index');
    }
}
