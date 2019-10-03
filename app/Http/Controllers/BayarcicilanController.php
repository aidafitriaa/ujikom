<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cicilan;
use Session;
use Auth;

class BayarcicilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cicilan = cicilan::all();
        return view('admin.cicilan.index',compact('cicilan')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cicilan = cicilan::all();
        return view('admin.cicilan.create',compact('cicilan')); 
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
        //     'nama_cicilan' => 'required|unique:cicilans'
        // ]);
        $cicilan = new cicilan();
        $cicilan->kode_cicilan = $request->kode_cicilan;
        $cicilan->kode_kredit = $request->kode_kredit;
        $cicilan->tgl_cicilan = $request->tgl_cicilan;
        $cicilan->jumlah_cicilan = $request->jumlah_cicilan;
        $cicilan->cicilan_ke = $request->cicilan_ke;
        $cicilan->cicilan_sisa_ke = $request->cicilan_sisa_ke;
        $cicilan->cicilan_harga_ke = $request->cicilan_harga_ke;
        $cicilan->save();
        $response = [
            'success' => true,
            'data' =>  $cicilan,
            'message' => 'Berhasil ditambahkan.'
        ];

        return redirect()->route('cicilan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cicilan = cicilan::findOrFail($id);
        return view('admin.cicilan.show',compact('cicilan')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cicilan = cicilan::findOrFail($id);
        return view('admin.cicilan.edit',compact('cicilan')); 
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
        //     'nama_cicilan' => 'required|unique:cicilans'
        // ]);
        $cicilan = cicilan::findOrFail($id);
        $cicilan->kode_cicilan = $request->kode_cicilan;
        $cicilan->kode_kredit = $request->kode_kredit;
        $cicilan->tgl_cicilan = $request->tgl_cicilan;
        $cicilan->jumlah_cicilan = $request->jumlah_cicilan;
        $cicilan->cicilan_ke = $request->cicilan_ke;
        $cicilan->cicilan_sisa_ke = $request->cicilan_sisa_ke;
        $cicilan->cicilan_harga_ke = $request->cicilan_harga_ke;
        $cicilan->save();
        $response = [
            'success' => true,
            'data' =>  $cicilan,
            'message' => 'Berhasil ditambahkan.'
        ];
        return redirect()->route('cicilan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $cicilan = cicilan::findOrfail($id);
        if(!cicilan::destroy($id)) return redirect()->back();
        Session::flash("flash_notification",[
            "level" => "Success",
            "message" => "Berhasil menghapus<b>"
                         . $cicilan->nama_cicilan."</b>"
        ]);
        return redirect()->route('cicilan.index');
    }
}
