@extends('layouts.master')
@section('title')
<title>Manajemen Buku Agenda</title>
@endsection
@section('content')
@section('pageheader')
Buku Agenda
@endsection
@section('b-item')
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('buku_agenda.index') }}">Buku Agenda</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Tambah
</li>
@endsection

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @card
                @slot('title')

                @endslot
                <form action="{{route('buku_agenda.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nomor_agenda">Nomor Agenda</label>
                        <input type="text" name="nomor_agenda" required maxlength="10"
                            class="form-control {{ $errors->has('nomor_agenda') ? 'is-invalid':'' }}">
                        <p class="text-danger">{{ $errors->first('nomor_agenda') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Agenda</label>
                        <input type="date" name="tanggal_agenda"
                            class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}">
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="kode_ekspedisi">Kode Ekspedisi</label>
                        <input type="text" name="kode_ekspedisi"
                            class="form-control {{ $errors->has('kode_ekspedisi') ? 'is-invalid':'' }}">
                        <p class="text-danger">{{ $errors->first('kode_ekspedisi') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"
                            class="form-control {{ $errors->has('deskripsi') ? 'is-invalid':'' }}"></textarea>
                        <p class="text-danger">{{ $errors->first('deskripsi') }}</p>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm">
                            <i class="fa fa-send"></i> Simpan
                        </button>
                    </div>
                </form>
                @slot('footer')
                ​
                @endslot
                @endcard
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    @endsection