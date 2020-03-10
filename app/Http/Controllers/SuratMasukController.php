<?php

namespace App\Http\Controllers;

use App\IsiKartu;
use App\JenisSurat;
use App\KartuKendali;
use App\LokasiKartu;
use App\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $unit = Auth::user()->unit_id;
        $unit2 = Unit::where('unit_id', '=', $unit)->select('unit_name')->get();
        $unit_name = $unit2[0]->unit_name;
        $sm = KartuKendali::with('jenis_surat:jenis_surat_id,deskripsi', 'klasifikasi_dokumen', 'unit:unit_id,unit_name', 'isi_kartu.unit')->where('status_kartu_kendali', '=', 1)->whereHas(
            'isi_kartu',
            function ($q) use ($unit_name) {
                $q->where([
                    ['to', $unit_name],
                    ['status_isi_kartu', 1]
                ])->orWhere([
                    ['from', $unit_name],
                    ['status_isi_kartu', 1]
                ]);
            }
        )->get();
        $test = KartuKendali::with('jenis_surat:jenis_surat_id,kode_surat')->get();
        // dd($test);
        return view('surat_kendali.surat_masuk.index', compact('sm'));
    }

    public function reply($id)
    {
        $surat = KartuKendali::findOrFail($id)->with('isi_kartu')->get();
        $ut = Unit::orderBy('unit_name', 'ASC')->get();
        return view('surat_kendali.surat_masuk.reply', compact('surat', 'ut'));
    }

    public function store_reply(Request $request)
    {
        $this->validate($request, [
            'unit' => 'required|numeric',
            'disposisi' => 'required|string'
        ]);
        $unit = Unit::where('unit_id', '=', $request->unit)->get();
        $unit2 = Unit::where('unit_id', '=', Auth::user()->unit_id)->get();
        $from = $unit2[0]->unit_name;
        $to = $unit[0]->unit_name;
        $tanggal = date('Y-m-d');
        // dd($from);
        $isi = IsiKartu::create([
            'kartu_kendali_id' => $request->kartu_kendali_id,
            'from' => $from,
            'to' => $to,
            'tanggal_membalas' => $tanggal,
            'disposisi' => $request->disposisi,
            'status_isi_kartu' => 0
        ]);
        return redirect(route('surat_masuk.index'))->with(['success' => 'Data Berhasil Ditambahkan!']);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $check = IsiKartu::where('kartu_kendali_id', '=', $id)->count();
        // if (!$check) {
        //     return redirect()->back();
        // }
        $ls = LokasiKartu::select('lokasi_kartu_id', 'nama_lokasi')->get();
        $js = JenisSurat::select('jenis_surat_id', 'kode_surat')->get();
        $sm = IsiKartu::with('kartu_kendali.jenis_surat', 'kartu_kendali.klasifikasi_dokumen', 'kartu_kendali.unit', 'lampiran', 'kartu_kendali.lokasi_kartu')->whereHas(
            'kartu_kendali',
            function ($q) use ($id) {
                $q->where([
                    ['kartu_kendali_id', $id],
                    ['status_isi_kartu', 1]
                ])->orWhere([
                    ['kartu_kendali_id', $id],
                    ['status_isi_kartu', 0]
                ]);
            }
        )->get();
        // dd($sm);
        return view('surat_kendali.surat_masuk.show', compact('sm', 'js', 'ls'));
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
        //
    }
}
