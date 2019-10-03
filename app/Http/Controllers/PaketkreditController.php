<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\paket_kredit;
use Session;
use Auth;

class PaketkreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paket_kredit = paket_kredit::all();
        return view('admin.paket_kredit.index',compact('paket_kredit')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paket_kredit = paket_kredit::all();
        return view('admin.paket_kredit.create',compact('paket_kredit')); 
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
        //     'paket_kredit' => 'required|unique:paket_kredits'
        // ]);
        $paket_kredit = new paket_kredit();
        $paket_kredit->kode_paket = $request->kode_paket;
        $paket_kredit->harga_paket = $request->harga_paket;
        $paket_kredit->uang_muka = $request->uang_muka;
        $paket_kredit->jumlah_cicilan = $request->jumlah_cicilan;
        $paket_kredit->bunga = $request->bunga;
        $paket_kredit->nilai_cicilan = $request->nilai_cicilan;
        $paket_kredit->save();
        $response = [
            'success' => true,
            'data' =>  $paket_kredit,
            'message' => 'Berhasil ditambahkan.'
        ];

        return redirect()->route('paket_kredit.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paket_kredit = paket_kredit::findOrfail($id);
        return view('admin.paket_kredit.show',compact('paket_kredit')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paket_kredit = paket_kredit::findOrFail($id);
        return view('admin.paket_kredit.edit',compact('paket_kredit')); 
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
        //     'paket_kredit' => 'required|unique:paket_kredits'
        // ]);
        $paket_kredit = paket_kredit::findOrFail($id);
        $paket_kredit->kode_paket = $request->kode_paket;
        $paket_kredit->harga_paket = $request->harga_paket;
        $paket_kredit->uang_muka = $request->uang_muka;
        $paket_kredit->jumlah_cicilan = $request->jumlah_cicilan;
        $paket_kredit->bunga = $request->bunga;
        $paket_kredit->nilai_cicilan = $request->nilai_cicilan;
        $paket_kredit->save();
        return redirect()->route('paket_kredit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         
        $paket_kredit = paket_kredit::findOrfail($id);
        if(!paket_kredit::destroy($id)) return redirect()->back();
        Session::flash("flash_notification",[
            "level" => "Success",
            "message" => "Berhasil menghapus<b>"
                         . $paket_kredit->paket_kredit."</b>"
        ]);
        return redirect()->route('paket_kredit.index');
    }
}
