<?php

namespace App\Http\Controllers;

use App\KlasifikasiDokumen;
use Illuminate\Http\Request;

class KlasifikasiDokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokumen = KlasifikasiDokumen::orderBy('kode_dokumen', 'ASC')->get();
        // dd($dokumen);
        return view('klasifikasi_dokumen.index', compact('dokumen'));
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
        $this->validate($request, [
            'kode_dokumen' => 'required|string|max:30',
            'deskripsi' => 'nullable|string'
        ]);
        $dokumen = KlasifikasiDokumen::firstOrCreate([
            'kode_dokumen' => $request->kode_dokumen
        ], [
            'deskripsi_dokumen' => $request->deskripsi
        ]);
        return redirect()->back()->with(['success' => 'Klasifikasi Dokumen Berhasil Ditambahkan!']);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dokumen = KlasifikasiDokumen::where('klasifikasi_dokumen_id', $id)->delete();
        return redirect()->back()->with(['success' => 'Data berhasil dihapus!']);
    }
}
