<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mobil;
use File;
use Session;
use Auth;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobil = mobil::all();
        return view('admin.mobil.index',compact('mobil')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mobil = mobil::all();
        return view('admin.mobil.create',compact('mobil')); 
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
        //     'kode_mobil' => 'required|unique:mobils',
        //     'merk' => 'required|min:50',
        //     'type' => 'required|min:50',
        //     'warna' => 'required|min:50',
        //     'harga_mobil' => 'required|min:50',
        //     'gambar' => 'required|mimes:jpeg,jpg,png,gif|max:2048',
        // ]);
        $mobil = mobil::findOrFail($id);
        $mobil->kode_mobil = $request->kode_mobil;
        $mobil->merk = $request->merk;
        $mobil->type = $request->type;
        $mobil->warna = $request->warna;
        $mobil->harga_mobil = $request->harga_mobil;
        
        // foto
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $path = public_path() .'/assets/img/mobil';
            $filename = '_'
            . $file->getClientOriginalName();
            $upload = $file->move(
                $path,$filename
            );
            $mobil->gambar = $filename;
        }
        $mobil->save();
        Session::flash("flash_notification",[
            "level" => "success",
            "message" => "Berhasil menyimpan <b>"
                         . $mobil->judul."</b>"
        ]);
        return redirect()->route('mobil.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mobil = mobil::findOrFail($id);
        return view('admin.mobil.show',compact('mobil')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mobil = mobil::findOrFail($id);
        return view('admin.mobil.edit',compact('mobil')); 
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
        $mobil = mobil::findOrFail($id);
        $mobil->kode_mobil = $request->kode_mobil;
        $mobil->merk = $request->merk;
        $mobil->type = $request->type;
        $mobil->warna = $request->warna;
        $mobil->harga_mobil = $request->harga_mobil;
        
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $path = public_path() .'/assets/img/mobil/';
            $filename = '_'
            . $file->getClientOriginalName();
            $upload = $file->move(
                $path,$filename
            );
            $mobil->gambar = $filename;
        }
        $mobil->save();
        Session::flash("flash_notification",[
            "level" => "success",
            "message" => "Berhasil menyimpan <b>"
                         . $mobil->judul."</b>"
        ]);
        return redirect()->route('mobil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mobil = mobil::findOrfail($id);
        if(!mobil::destroy($id)) return redirect()->back();
        Session::flash("flash_notification",[
            "level" => "Success",
            "message" => "Berhasil menghapus<b>"
                         . $mobil->mobil."</b>"
        ]);
        return redirect()->route('mobil.index');
    }
}
