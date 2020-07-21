@extends('layouts.master')
@section('title')
<title>Membalas Isi Kartu Kendali</title>
@endsection
@section('content')
@section('pageheader')
Membalas Isi Kartu Kendali
@endsection
@section('b-item')
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('surat_masuk.index') }}">Proses Kartu Kendali</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Membalas
</li>
@endsection
<style>
    .files input {
        outline: 2px dashed #92b0b3;
        outline-offset: -10px;
        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
        transition: outline-offset .15s ease-in-out, background-color .15s linear;
        padding: 120px 0px 85px 35%;
        text-align: center !important;
        margin: 0;
        width: 100% !important;
    }

    .files input:focus {
        outline: 2px dashed #92b0b3;
        outline-offset: -10px;
        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
        transition: outline-offset .15s ease-in-out, background-color .15s linear;
        border: 1px solid #92b0b3;
    }

    .files {
        position: relative
    }

    .files:after {
        pointer-events: none;
        position: absolute;
        top: 60px;
        left: 0;
        width: 50px;
        right: 0;
        height: 56px;
        content: "";
        background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
        display: block;
        margin: 0 auto;
        background-size: 100%;
        background-repeat: no-repeat;
    }

    .color input {
        background-color: #ffff;
    }

    .files:before {
        position: absolute;
        bottom: 10px;
        left: 0;
        pointer-events: none;
        width: 100%;
        right: 0;
        height: 57px;
        content: " Tarik file kesini. ";
        display: block;
        margin: 0 auto;
        color: #2ea591;
        font-weight: 600;
        text-transform: capitalize;
        text-align: center;
    }
</style>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @card
                @slot('title')
                Isi Kartu Kendali
                @endslot
                <form id="form" data-parsley-validate="" novalidate="" method="post"
                    action="{{route('surat_masuk.reply.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">
                            Kepada Unit</label>
                        <div class="col-9 col-lg-10">
                            <select name="unit" id="unit"
                                class="form-control {{ $errors->has('unit') ? 'is-invalid':'' }}">
                                <option value="">Pilih Unit</option>
                                @foreach ($ut as $key => $row)
                                @php
                                $selected=($surat->isi_kartu[0]->unit_id == $row->unit_id)? "selected" : "";
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
                        <input type="hidden" value="{{$surat->kartu_kendali_id}}" name="kartu_kendali_id">
                    </div>
                    <div class="row pt-2 pt-sm-5 mt-1">
                        <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">

                        </div>

                    </div>
                    @slot('footer')
                    @endslot
                    @endcard
                    @card
                    @slot('title')
                    Lampiran
                    @endslot
                    <div class="form-group files color">
                        {{-- <label>Upload Your File </label> --}}
                        <input type="file" class="form-control {{ $errors->has('files[]') ? 'is-invalid':'' }}"
                            multiple='multiple' name="files[]">
                        <div class="invalid-feedback">
                            {{ $errors->first('files[]') }}
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