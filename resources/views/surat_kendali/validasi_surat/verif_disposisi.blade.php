@extends('layouts.master')
@section('title')
<title>Show Surat</title>
@endsection
@section('content')
@section('pageheader')
Show Surat
@endsection
@section('b-item')
<li class="breadcrumb-item" aria-current="page"><a href="">Proses Surat</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Show Surat
</li>
@endsection
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-sm-6">
                                        <h5 class="mb-3">Kode :
                                            {{ $vr[0]->kartu_kendali->klasifikasi_dokumen->kode_dokumen }}
                                        </h5>
                                        <h5 class="mb-1">Perihal : {{ $vr[0]->kartu_kendali->perihal }}</h5>
                                        {{-- <h3 class="text-dark mb-1">Gerald A. Garcia</h3>

                                        <div>2546 Penn Street</div>
                                        <div>Sikeston, MO 63801</div>
                                        <div>Email: info@gerald.com.pl</div>
                                        <div>Phone: +573-282-9117</div> --}}
                                    </div>
                                    <div class="col-sm-6">
                                        <h5 class="mb-3">No :
                                            {{ $vr[0]->kartu_kendali->kartu_kendali_id }}
                                        </h5>
                                        <h5 class="mb-1">Tanggal : {{ $vr[0]->kartu_kendali->tanggal_pembuatan}}</h5>
                                        {{-- <h3 class="text-dark mb-1">Anthony K. Friel</h3>
                                        <div>478 Collins Avenue</div>
                                        <div>Canal Winchester, OH 43110</div>
                                        <div>Email: info@anthonyk.com</div>
                                        <div>Phone: +614-837-8483</div> --}}
                                    </div>
                                </div>
                                <div class="table-responsive-sm">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="center">Tanggal</th>
                                                <th>Dari Unit</th>
                                                <th>Untuk Unit</th>
                                                <th class="center">Disposisi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <form action="{{route('validasi.store')}}" method="post">
                                            @csrf
                                            <tbody>
                                                @forelse ($vr as $row)
                                                <input type="hidden" value="{{ $row->isi_kartu_id }}"
                                                    name="isi_kartu_id">
                                                <tr>
                                                    <td class="center">{{ $row->tanggal_membalas }}</td>
                                                    <td class="center">{{ $row->from }}</td>
                                                    <td class="center">{{ $row->to }}</td>
                                                    <td class="center">{{ $row->disposisi }}</td>
                                                    <td class="center">
                                                        <select name="verif" id="" class="form-control">
                                                            @if ($row->status_isi_kartu === 0)
                                                            <option value="1">
                                                                Verifikasi
                                                            </option>
                                                            <option value="0" selected>Belum Verifikasi</option>
                                                            @else
                                                            <option value="1" selected>
                                                                Verifikasi
                                                            </option>
                                                            <option value="0">Belum Verifikasi</option>
                                                            @endif
                                                        </select>
                                                    </td>
                                                </tr>
                                                @empty
                                                <td colspan="5" class="text-center">Tidak Ada Data</td>
                                                @endforelse
                                            </tbody>
                                    </table>
                                    <div class="float-right mt-3">
                                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection