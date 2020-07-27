<?php

namespace App\Http\Controllers;

use App\BukuAgenda;
use App\IsiKartu;
use App\JenisSurat;
use App\KartuKendali;
use App\KlasifikasiDokumen;
use App\LokasiKartu;
use App\Unit;
use App\LampiranFile;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use File;
use PDF;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lampiran(Request $request)
    {
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path() . '/uploads/lampiran/', $filename);
            }
        }
    }
    public function index(Request $request)
    {
        $unit = Auth::user()->unit_id;
        $unit2 = Unit::where('unit_id', '=', $unit)->select('unit_name')->get();
        $unit_name = $unit2[0]->unit_name;
        $sk = KartuKendali::with('jenis_surat:jenis_surat_id,deskripsi_surat', 'klasifikasi_dokumen', 'unit:unit_id,unit_name', 'isi_kartu.unit')->whereHas(
            'isi_kartu',
            function ($q) use ($unit) {
                $q->where([
                    ['unit_id', $unit],
                    ['status_kartu_kendali', 0],
                    // ['status_kartu_kendali', 0],
                ])->orWhere([
                    ['unit_id', $unit],
                    ['status_kartu_kendali', 1]
                ])->orWhere([
                    ['unit_id', $unit],
                    ['status_kartu_kendali', 3]
                ]);
                // $q->orWhere('status_kartu_kendali', 0);
            }
        )->get();
        // dd($sk);
        return view('surat_kendali.surat_keluar.index', compact('sk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $js = JenisSurat::orderBy('kode_surat', 'ASC')->get();
        $kd = KlasifikasiDokumen::orderBy('kode_dokumen', 'ASC')->get();
        $ut = Unit::orderBy('unit_name', 'ASC')->get();
        $lk = LokasiKartu::orderBy('nama_lokasi', 'ASC')->get();
        return view('surat_kendali.surat_keluar.create', compact(['js', 'kd', 'ut', 'lk']));
    }

    public function reply($id)
    {
        $surat = KartuKendali::with('isi_kartu')->where('kartu_kendali_id', $id)->get();
        $ut = Unit::orderBy('unit_name', 'ASC')->get();
        return view('surat_kendali.surat_keluar.reply', compact(['ut', 'surat']));
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
            'status_isi_kartu' => 1
        ]);
        return redirect(route('surat_keluar.index'))->with(['success' => 'Data Berhasil Ditambahkan!']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);
        $this->validate($request, [
            'jenis_surat_id' => 'required|numeric',
            'lokasi_kartu_id' => 'required|numeric',
            'perihal' => 'required|string|max:100',
            'unit' => 'required|numeric',
            'disposisi' => 'required|string',
            'files.*' => 'nullable|file|mimes:png,jpg,jpeg|max:2048'
        ]);
        $tanggal = date('Y-m-d');
        $unit = Auth::user()->unit_id;
        $kartu_kendali = KartuKendali::create([
            'jenis_surat_id' => $request->jenis_surat_id,
            'perihal' => $request->perihal,
            'tanggal_pembuatan' => $tanggal,
            'status_kartu_kendali' => 0,
            'klasifikasi_dokumen_id' => 1,
            'lokasi_kartu_id' => $request->lokasi_kartu_id,
            'unit_id' => $unit,
        ]);
        $current_id = KartuKendali::max('kartu_kendali_id');
        $unit = Unit::where('unit_id', '=', $request->unit)->first();
        $unit2 = Unit::where('unit_id', '=', Auth::user()->unit_id)->first();
        $from = $unit2->unit_name;
        $to = $unit->unit_name;
        $isi_kartu = IsiKartu::create([
            'kartu_kendali_id' => $current_id,
            'from' => $from,
            'to' => $to,
            'tanggal_membalas' => $tanggal,
            'disposisi' => $request->disposisi,
            'status_isi_kartu' => 1,
        ]);
        if ($request->hasFile('files')) {
            $iki = IsiKartu::max('isi_kartu_id');
            foreach ($request->file('files') as $file) {
                $filename = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/uploads/lampiran/', $filename);
                LampiranFile::insert([
                    'isi_kartu_id' => $iki,
                    'nama_lampiran' => $filename,
                ]);
            }
        }
        return redirect(route('surat_keluar.index'))->with(['success' => 'Data Berhasil Ditambahkan!']);
    }

    public function notis()
    {
        $noUrutAkhir = KartuKendali::max('kartu_kendali_id');
        if ($noUrutAkhir) {
            $tanggal = date("Ymd");
            $tanggal2 = substr($tanggal, 2, 6);
            $akhir = substr($noUrutAkhir, 6, 3);
            $noBaru = $tanggal2 . "00" . ($akhir + 1);
        } else {
            $no = "001";
            $tanggal = date("Ymd");
            $tanggal2 = substr($tanggal, 2, 6);
            $noBaru = $tanggal2 . $no;
        }
        return $noBaru;
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
        $surat = KartuKendali::with('isi_kartu')->where('kartu_kendali_id', $id)->get();
        $js = JenisSurat::orderBy('kode_surat', 'ASC')->get();
        $ba = BukuAgenda::orderBy('nomor_agenda', 'ASC')->get();
        $kd = KlasifikasiDokumen::orderBy('kode_dokumen', 'ASC')->get();
        $ut = Unit::orderBy('unit_name', 'ASC')->get();
        $lk = LokasiKartu::orderBy('nama_lokasi', 'ASC')->get();
        return view('surat_kendali.surat_keluar.edit', compact(['js', 'ba', 'kd', 'ut', 'lk', 'surat']));
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
        $this->validate($request, [
            'jenis_surat_id' => 'required|numeric',
            'buku_agenda_id' => 'required|numeric',
            'klasifikasi_dokumen_id' => 'required|numeric',
            'lokasi_kartu_id' => 'required|numeric',
            'perihal' => 'required|string|max:100',
            'unit' => 'required|numeric',
            'disposisi' => 'required|string',
        ]);
        $kartu_kendali = KartuKendali::where('kartu_kendali_id', '=', $id)->update([
            'jenis_surat_id' => $request->jenis_surat_id,
            'buku_agenda_id' => $request->buku_agenda_id,
            'klasifikasi_dokumen_id' => $request->klasifikasi_dokumen_id,
            'lokasi_kartu_id' => $request->lokasi_kartu_id,
            'perihal' => $request->perihal,
        ]);

        $isi_kartu = IsiKartu::where('kartu_kendali_id', '=', $id)->update([
            'unit_id' => $request->unit,
            'disposisi' => $request->disposisi,
        ]);
        return redirect(route('surat_keluar.index'))->with(['success' => 'Data Berhasil Diubah!']);
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

    public function selesai($id)
    {
        try {
            $kartu_kendali = KartuKendali::where('kartu_kendali_id', '=', $id)->update([
                'status_kartu_kendali' => 3
            ]);
            return redirect(route('surat_keluar.index'))->with(['success' => 'Berhasil Diselesaikan !']);
        } catch (\Throwable $th) {
            return redirect(route('surat_keluar.index'))->with(['error' => 'Surat Gagal Diselesaikan!']);
        }
    }

    public function cetakPdf($id)
    {
        // $js = JenisSurat::all();
        // $sm = IsiKartu::with('kartu_kendali.jenis_surat', 'kartu_kendali.klasifikasi_dokumen', 'kartu_kendali.unit', 'lampiran')->whereHas(
        //     'kartu_kendali',
        //     function ($q) use ($id) {
        //         $q->where([
        //             ['kartu_kendali_id', $id],
        //             ['status_isi_kartu', 1]
        //         ])->orWhere([
        //             ['kartu_kendali_id', $id],
        //             ['status_isi_kartu', 0]
        //         ]);
        //     }
        // )->get();
        $sm = KartuKendali::with('isi_kartu.lampiran','klasifikasi_dokumen','lokasi_kartu','jenis_surat')->whereHas('isi_kartu', function($q) use ($id){
            $q->where([
                ['status_isi_kartu', 1],
                ['status_kartu_kendali', 3]
            ]);
        })->findOrFail($id);
        if ($sm == "") {
            return redirect()->route('surat_keluar.index');
        }
        // dd($js);
        // PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('surat_kendali.surat_keluar.print', compact('sm'))->setPaper('a4', 'portrait')->setOption('no-stop-slow-scripts', true);
        return $pdf->stream();
    }
}
