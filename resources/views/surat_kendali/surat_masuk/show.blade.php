@extends('layouts.master')
@section('title')
<title>Tampil Kartu Kendali</title>
@endsection
@section('content')
@section('pageheader')
Tampil Kartu Kendali
@endsection
@section('b-item')
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('surat_masuk.index') }}">Proses Kartu Kendali</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Tampil
</li>
@endsection
<section class="content">
    <div class="container-fluid">
        {{-- card 1 --}}
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header p-4">
                                {{-- <a class="pt-2 d-inline-block" href="index.html">Concept</a> --}}

                                <div class="text-center">
                                    {{-- <h3 class="mb-0">Invoice #1</h3> --}}
                                    <img src="{{asset('uploads/logo/binainsani.png')}}" alt="Universitas Bina Insani"
                                        width="400">
                                </div>
                                {{-- <div class="text-center mt-2">
                                    Jalan Raya Siliwangi No.6
                                </div> --}}
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-6">

                                    </div>
                                    <div class="col-sm-6 ">
                                        <div class="col-sm-6">
                                        </div>
                                        <div class="col-sm-6 float-right">

                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h5 class="mb-3">No : {{ $sm->kartu_kendali_id }}
                                        </h5>
                                        <h5 class="mb-1">Perihal : {{$sm->perihal}}</h5>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5 class="mb-3">Kode :
                                            {{ $sm->klasifikasi_dokumen->kode_dokumen }}</h5>
                                        <h5 class="mb-1">Tanggal :
                                            {{date('d F yy', strtotime($sm->tanggal_pembuatan))}}
                                        </h5>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" disabled checked><span
                                                class="custom-control-label">{{$sm->jenis_surat->deskripsi_surat}}
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" disabled checked><span
                                                class="custom-control-label">{{$sm->lokasi_kartu->nama_lokasi}}
                                            </span>
                                        </label>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sm->isi_kartu as $row)
                                            <tr>
                                                <td class="center">
                                                    {{date('d F yy', strtotime($row->tanggal_membalas))}}
                                                </td>
                                                <td class="center">{{ $row->from }}</td>
                                                <td class="center">{{ $row->to }}</td>
                                                <td class="center">{{ $row->disposisi }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- card 2 --}}
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

                                @forelse ($sm->isi_kartu as $item)
                                @forelse ($item->lampiran as $row)
                                <div class="carousel-item active">
                                    <img src="{{ asset('uploads/lampiran/'. $row->nama_lampiran) }}" class="img-fluid">
                                </div>
                                @empty

                                @endforelse
                                @empty

                                @endforelse
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
    {{-- end of card 2 --}}
    </div>
    </div>
</section>
@endsection
@section('js')
<script>
    $('.form-delete').on('submit', function(e){
            var form = this;
            e.preventDefault();
            Swal.fire({
                title: 'Apa anda yakin ingin menghapus data ?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.value) {
                    return form.submit();
                }
            })
        });
</script>
@endsection