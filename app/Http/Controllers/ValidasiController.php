<?php

namespace App\Http\Controllers;

use App\BukuAgenda;
use App\IsiKartu;
use App\JenisSurat;
use App\KartuKendali;
use App\KlasifikasiDokumen;
use App\LokasiKartu;
use App\Unit;
use Illuminate\Http\Request;

class ValidasiController extends Controller
{
    public function index()
    {
        $vd = KartuKendali::with('jenis_surat', 'klasifikasi_dokumen', 'unit', 'isi_kartu')->whereHas('isi_kartu', function ($q) {
            $q->where([
                // ['status_isi_kartu', 0],
                ['status_kartu_kendali', 0]
            ]);
            // $q->orWhere([
            //     ['status_isi_kartu', 0],
            //     ['status_kartu_kendali', 1]
            // ]);
        })->get();
        // dd($vd);
        return view('surat_kendali.validasi_surat.index', compact('vd'));
    }

    // public function verif_disposisi($id)
    // {
    //     $vr = IsiKartu::with('kartu_kendali.jenis_surat', 'kartu_kendali.klasifikasi_dokumen', 'kartu_kendali.unit')->where([
    //         ['kartu_kendali_id', '=', $id],
    //         ['status_isi_kartu', '=', 0]
    //     ])->orderBy('created_at', 'ASC')->get();
    //     // dd($vr);
    //     return view('surat_kendali.validasi_surat.verif_disposisi', compact('vr'));
    // }

    // public function verif_change_disposisi(Request $request)
    // {
    //     $this->validate($request, [
    //         'verif' => 'required',
    //         'isi_kartu_id' => 'required|numeric'
    //     ]);
    //     // dd($request);
    //     $vr = IsiKartu::where('isi_kartu_id', $request->isi_kartu_id)
    //         ->update(['status_isi_kartu' => $request->verif]);
    //     return redirect(route('validasi_surat.index'))->with(['success' => 'Disposisi berhasil di verifikasi!']);
    // }

    public function verif_surat($id)
    {
        if ($id == "") {
            return redirect()->back();
        }
        $kd = KlasifikasiDokumen::orderBy('kode_dokumen', 'ASC')->get();
        $vs = KartuKendali::with('jenis_surat', 'klasifikasi_dokumen', 'unit', 'isi_kartu.lampiran')->whereHas('isi_kartu', function ($q) use ($id) {
            $q->where([
                // ['status_isi_kartu', 1],
                ['status_kartu_kendali', 0],
                ['kartu_kendali_id', $id]
            ]);
        })->first();
        if ($vs == "") {
            return redirect()->route('validasi_surat.index');
        }
        // dd($vs);
        $kki = $id;
        // dd($vs);
        return view('surat_kendali.validasi_surat.verif_surat', compact(['vs', 'kd', 'kki']));
    }

    public function update_surat(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'klasifikasi_dokumen_id' => 'required|numeric',
            'kartu_kendali_id' => 'required|numeric'
        ]);
        KartuKendali::where('kartu_kendali_id', $request->kartu_kendali_id)->update([
            'klasifikasi_dokumen_id' =>  $request->klasifikasi_dokumen_id,
            // 'buku_agenda_id' => $request->buku_agenda_id,
            'status_kartu_kendali' => 1
        ]);

        return redirect(route('validasi_surat.index'))->with(['success' => 'Berhasil Diverifikasi']);
    }
}
