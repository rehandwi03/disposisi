@extends('layouts.master')
@section('title')
<title>Ubah Surat Keluar</title>
@endsection
@section('content')
@section('pageheader')
Surat Keluar
@endsection
@section('b-item')
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('surat_keluar.index') }}">Surat Keluar</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Ubah
</li>
@endsection
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @card
                @slot('title')
                Keterangan Surat
                @endslot
                <form id="form" data-parsley-validate="" novalidate="" method="post"
                    action="{{route('surat_keluar.update', $surat[0]->kartu_kendali_id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">Jenis Surat</label>
                        <div class="col-9 col-lg-10">
                            <select name="jenis_surat_id" id="jenis_surat_id"
                                class="form-control {{ $errors->has('jenis_surat_id') ? 'is-invalid':'' }}">
                                <option value="">Pilih Jenis Surat</option>
                                @forelse ($js as $row)
                                {{-- <option value="{{$row->jenis_surat_id}}">{{ $row->kode_surat }} -
                                {{ $row->deskripsi }}</option> --}}
                                @php
                                $selected=($surat[0]->jenis_surat_id == $row->jenis_surat_id)? "selected" : "";
                                @endphp
                                <option {{$selected}} value="{{$row->jenis_surat_id}}">{{$row->deskripsi}}
                                </option>
                                @empty
                                <option value="">Tidak Ada Data</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nomor" class="col-3 col-lg-2 col-form-label text-right">Nomor</label>
                        <div class="col-9 col-lg-10">
                            <select name="buku_agenda_id" id="nomor"
                                class="form-control {{ $errors->has('buku_agenda_id') ? 'is-invalid':'' }}">
                                <option value="">Pilih Nomor</option>
                                @forelse ($ba as $row)
                                @php
                                $selected=($surat[0]->buku_agenda_id == $row->buku_agenda_id)? "selected" : "";
                                @endphp
                                <option {{$selected}} value="{{$row->buku_agenda_id}}">{{ $row->nomor_agenda }} -
                                    {{$row->deskripsi}}
                                </option>
                                @empty
                                <option value="">Tidak Ada Data</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kode" class="col-3 col-lg-2 col-form-label text-right">Kode</label>
                        <div class="col-9 col-lg-10">
                            <select name="klasifikasi_dokumen_id" id="kode"
                                class="form-control {{ $errors->has('klasifikasi_dokumen_id') ? 'is-invalid':'' }}">
                                <option value="">Pilih Kode</option>
                                @forelse ($kd as $row)
                                @php
                                $selected=($surat[0]->klasifikasi_dokumen_id == $row->klasifikasi_dokumen_id)?
                                "selected" : "";
                                @endphp
                                <option {{$selected}} value="{{$row->klasifikasi_dokumen_id}}">{{ $row->kode_dokumen }}
                                    -
                                    {{$row->deskripsi}}
                                </option>
                                @empty
                                <option value="">Tidak Ada Data</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lokasi_kartu_id" class="col-3 col-lg-2 col-form-label text-right">Lokasi
                            Kartu</label>
                        <div class="col-9 col-lg-10">
                            <select name="lokasi_kartu_id" id="lokasi_kartu_id"
                                class="form-control {{ $errors->has('lokasi_kartu_id') ? 'is-invalid':'' }}">
                                <option value="">Pilih Lokasi Kartu</option>
                                @forelse ($lk as $row)
                                {{-- <option value="{{$row->lokasi_kartu_id}}">{{$row->nama_lokasi}}
                                </option> --}}
                                @php
                                $selected=($surat[0]->lokasi_kartu_id == $row->lokasi_kartu_id)?
                                "selected" : "";
                                @endphp
                                <option {{$selected}} value="{{$row->lokasi_kartu_id}}">{{ $row->nama_lokasi }}
                                </option>
                                @empty
                                <option value="">Tidak Ada Data</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="perihal" class="col-3 col-lg-2 col-form-label text-right">Perihal</label>
                        <div class="col-9 col-lg-10">
                            <input type="text" name="perihal"
                                class="form-control {{ $errors->has('perihal') ? 'is-invalid':'' }}"
                                value="{{$surat[0]->perihal}}">
                        </div>
                    </div>
                    @slot('footer')
                    ​
                    @endslot
                    @endcard

                    @card
                    @slot('title')
                    Isi Surat
                    @endslot
                    <form id="form" data-parsley-validate="" novalidate="">
                        <div class="form-group row">
                            <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">
                                Kepada Unit</label>
                            <div class="col-9 col-lg-10">
                                {{-- <input id="inputEmail2" type="email" required="" data-parsley-type="email"
                                placeholder="Email" class="form-control"> --}}
                                <select name="unit" id="unit"
                                    class="form-control {{ $errors->has('unit') ? 'is-invalid':'' }}">
                                    <option value="">Pilih Unit</option>
                                    @foreach ($ut as $key => $row)
                                    {{-- <option value="{{$row->unit_id}}">{{ $row->unit_name }}</option> --}}
                                    @php
                                    $selected=($surat[0]->isi_kartu[0]->unit_id == $row->unit_id)? "selected" : "";
                                    echo '<option '.$selected.' value="'.$row->unit_id.'">'.$row->unit_name.'</option>
                                    ';
                                    @endphp
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="disposisi" class="col-3 col-lg-2 col-form-label text-right">Disposisi</label>
                            <div class="col-9 col-lg-10">
                                <textarea name="disposisi" id="" cols="30" rows="10"
                                    class="form-control {{ $errors->has('disposisi') ? 'is-invalid':'' }}">{{ $surat[0]->isi_kartu[0]->disposisi }}</textarea>
                            </div>
                        </div>
                        <div class="row pt-2 pt-sm-5 mt-1">
                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">

                            </div>
                            <div class="col-sm-6 pl-0">
                                <p class="text-right">
                                    <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                    <button class="btn btn-space btn-secondary">Cancel</button>
                                </p>
                            </div>
                        </div>
                        @slot('footer')
                        @endslot
                        @endcard
                    </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    @endsection