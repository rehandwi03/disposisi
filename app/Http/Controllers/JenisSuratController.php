<?php

namespace App\Http\Controllers;

use App\JenisSurat;
use Illuminate\Http\Request;

class JenisSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat = JenisSurat::orderBy('kode_surat', 'DESC')->get();
        return view('jenissurat.index', compact('surat'));
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
            'kode_surat' => 'required|string|max:20',
            'deskripsi' => 'nullable|string|'
        ]);

        $surat = JenisSurat::firstOrCreate([
            'kode_surat' => $request->kode_surat
        ], [
            'deskripsi' => $request->deskripsi
        ]);
        return redirect()->back()->with(['success' => 'Jenis Surat Berhasil Ditambahkan!']);
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
        $surat = JenisSurat::where('jenis_surat_id', $id)->delete();
        return redirect()->back()->with(['success' => 'Data berhasil dihapus!']);
    }
}
