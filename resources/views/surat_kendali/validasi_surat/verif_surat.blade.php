@extends('layouts.master')
@section('title')
<title>Validasi Kartu Kendali</title>
@endsection
@section('content')
@section('pageheader')
Validasi Kartu Kendali
@endsection
@section('b-item')
<li class="breadcrumb-item" aria-current="page"><a href="{{route('validasi_surat.index')}}">Validasi</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Validasi Kartu Kendali
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
                    action="{{route('verif_surat.store')}}">
                    @csrf
                    <input type="hidden" value="{{$kki}}" name="kartu_kendali_id">
                    {{-- <div class="form-group row">
                        <label for="nomor" class="col-3 col-lg-2 col-form-label text-right">Nomor</label>
                        <div class="col-9 col-lg-10">
                            <select name="buku_agenda_id" id="nomor"
                                class="form-control {{ $errors->has('buku_agenda_id') ? 'is-invalid':'' }}">
                    <option value="">Pilih Nomor</option>
                    @forelse ($ba as $row)
                    <option value="{{$row->buku_agenda_id}}">{{ $row->nomor_agenda }} -
                        {{ $row->deskripsi }}</option>
                    @empty
                    <option value="">Tidak Ada Data</option>
                    @endforelse
                    </select>
            </div>
        </div> --}}
        <div class="form-group row">
            <label for="kode" class="col-3 col-lg-2 col-form-label text-right">Kode</label>
            <div class="col-9 col-lg-10">
                <select name="klasifikasi_dokumen_id" id="kode"
                    class="selectpicker {{ $errors->has('klasifikasi_dokumen_id') ? 'is-invalid':'' }}"
                    data-live-search="true">
                    <option value="">Pilih Kode</option>
                    @forelse ($kd as $row)
                    <option value=" {{$row->klasifikasi_dokumen_id}}">
                        {{$row->kode_dokumen}}-{{$row->deskripsi_dokumen}}
                    </option>
                    @empty
                    <option value="">Tidak Ada Data</option>
                    @endforelse
                </select>
                <p class="text-danger">{{ $errors->first('klasifikasi_dokumen_id') }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label for="perihal" class="col-3 col-lg-2 col-form-label text-right">Perihal</label>
            <div class="col-9 col-lg-10">
                <label class="form-control">{{ $vs->perihal }}</label>
            </div>
        </div>
        @slot('footer')
        ​
        @endslot
        @endcard

        @card
        @slot('title')
        Isi Kartu Kendali
        @endslot
        <form id="form" data-parsley-validate="" novalidate="">
            <div class="form-group row">
                <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">
                    Dari Unit</label>
                <div class="col-9 col-lg-10">
                    {{-- <input id="inputEmail2" type="email" required="" data-parsley-type="email"
                                placeholder="Email" class="form-control"> --}}
                    {{-- <select name="unit" id="unit" class="form-control {{ $errors->has('unit') ? 'is-invalid':'' }}">
                    <option value="">Pilih Unit</option>
                    @foreach ($ut as $row)
                    <option value="{{$row->unit_id}}">{{ $row->unit_name }}</option>
                    @endforeach
                    </select> --}}
                    <label class="form-control">{{ $vs->isi_kartu[0]->from }}</label>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">
                    Kepada Unit</label>
                <div class="col-9 col-lg-10">
                    {{-- <input id="inputEmail2" type="email" required="" data-parsley-type="email"
                                placeholder="Email" class="form-control"> --}}
                    {{-- <select name="unit" id="unit" class="form-control {{ $errors->has('unit') ? 'is-invalid':'' }}">
                    <option value="">Pilih Unit</option>
                    @foreach ($ut as $row)
                    <option value="{{$row->unit_id}}">{{ $row->unit_name }}</option>
                    @endforeach
                    </select> --}}
                    @foreach ($vs->isi_kartu as $data)
                    <label class="form-control">{{ $data->to }}</label>
                    @endforeach
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">
                    Disposisi</label>
                <div class="col-9 col-lg-10">
                    {{-- <input id="inputEmail2" type="email" required="" data-parsley-type="email"
                                placeholder="Email" class="form-control"> --}}
                    {{-- <select name="unit" id="unit" class="form-control {{ $errors->has('unit') ? 'is-invalid':'' }}">
                    <option value="">Pilih Unit</option>
                    @foreach ($ut as $row)
                    <option value="{{$row->unit_id}}">{{ $row->unit_name }}</option>
                    @endforeach
                    </select> --}}
                    <textarea name="disposisi" cols="30" rows="10" class="form-control"
                        readonly>{{ $vs->isi_kartu[0]->disposisi }}</textarea>
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
    <div class="row">
        <div class="col-md-12">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 px-0">
                <div class="card">
                    <h5 class="card-header">Lampiran</h5>
                    <div class="card-body">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                                </li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                {{-- <div class="carousel-item active">
                                    <embed
                                        src="{{ asset('uploads/lampiran/1581584959jurnal penelitian terkait.pdf') }}"
                                type="" width="960" height="600" class="">
                            </div>
                            <div class="carousel-item">
                                <embed src="{{ asset('uploads/lampiran/1581584959jurnal penelitian terkait.pdf') }}"
                                    type="" width="960" height="600" class="">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="../assets/images/card-img-3.jpg" alt="Third slide">
                            </div> --}}
                            @php
                            $no = 0;
                            @endphp
                            @foreach ($vs->isi_kartu as $data)
                            @foreach ($data->lampiran as $lm)
                            {{-- @php
                            $active=($lm->lampiran == $unt->unit_id)? "selected" : "";
                            @endphp --}}
                            <?php
                            $no++;
                            if ($no == 1) {
                                $active = 'active';
                            }else{
                                $active = '';
                            }
                            ?>
                            <div class="carousel-item {{$active}}">
                                <embed src="{{ asset('uploads/lampiran/'. $lm->nama_lampiran) }}" type="" width="960"
                                    height="600" class="">
                            </div>
                            @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span> </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span> </a>
        </div>
    </div>
    </div>
    </div>
</section>
@endsection
@section('js')
<script>
    @endsection