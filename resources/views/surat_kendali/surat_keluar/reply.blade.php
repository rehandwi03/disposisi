@extends('layouts.master')
@section('title')
<title>Membalas Surat</title>
@endsection
@section('content')
@section('pageheader')
Membalas Surat
@endsection
@section('b-item')
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('surat_keluar.index') }}">Surat Keluar</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Membalas
</li>
@endsection
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @card
                @slot('title')
                Isi Surat
                @endslot
                <form id="form" data-parsley-validate="" novalidate="" method="post"
                    action="{{route('surat_keluar.reply.store')}}">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">
                            Kepada Unit</label>
                        <div class="col-9 col-lg-10">
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
                                class="form-control {{ $errors->has('disposisi') ? 'is-invalid':'' }}"></textarea>
                        </div>
                        <input type="hidden" value="{{$surat[0]->kartu_kendali_id}}" name="kartu_kendali_id">
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