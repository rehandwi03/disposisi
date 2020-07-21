<?php

namespace App\Http\Controllers;

use App\BukuAgenda;
use App\KartuKendali;
use Illuminate\Http\Request;

class BukuAgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ba = KartuKendali::with('jenis_surat:jenis_surat_id,deskripsi_surat', 'klasifikasi_dokumen', 'unit:unit_id,unit_name', 'isi_kartu.unit')->whereHas(
            'isi_kartu'
            // function ($q) use ($unit) {
            //     $q->where([
            //         ['unit_id', $unit],
            //         ['status_kartu_kendali', 0],
            //         // ['status_kartu_kendali', 0],
            //     ])->orWhere([
            //         ['unit_id', $unit],
            //         ['status_kartu_kendali', 1]
            //     ])->orWhere([
            //         ['unit_id', $unit],
            //         ['status_kartu_kendali', 3]
            //     ]);
            //     // $q->orWhere('status_kartu_kendali', 0);
            // }
        )->get();
        return view('buku_agenda.index', compact('ba'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku_agenda.create');
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
            'kode_ekspedisi' => 'required|string|max:50',
            'deskripsi' => 'string'
        ]);

        $agenda = BukuAgenda::firstOrCreate([
            'kode_ekspedisi' => $request->kode_ekspedisi
        ], [
            'deskripsi' => $request->deskripsi
        ]);
        return redirect()->back()->with(['success' => 'Buku Agenda Berhasil Ditambahkan!']);
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
        $agenda = BukuAgenda::where('buku_agenda_id', $id)->delete();
        return redirect()->back()->with(['success' => 'Data berhasil dihapus!']);
    }
}
