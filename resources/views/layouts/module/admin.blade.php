@extends('layouts.master')
@section('title')
<title>Home</title>
@endsection
@section('content')
@section('pageheader')
HALAMAN UTAMA
@endsection
<div class="row">
    <!-- ============================================================== -->
    <!-- sales  -->
    <!-- ============================================================== -->
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body ">
                @role('Admin')
                <div class="d-inline-block">
                    <h5 class="text-muted">Jumlah User</h5>
                    <h2 class="mb-0"> {{ $juser }}</h2>
                </div>
                <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                    <i class="fa fa-user fa-fw fa-sm text-primary"></i>
                </div>
                @endrole
                @role('Sekertariat')
                <div class="d-inline-block">
                    <h5 class="text-muted">Menunggu Validasi</h5>
                    <h2 class="mb-0"> {{ $uvs }}</h2>
                </div>
                <div class="float-right icon-circle-medium  icon-box-lg  bg-danger-light mt-1">
                    <i class="fas fa-window-close fa-fw fa-sm text-danger"></i>
                </div>
                @endrole
                @role('Unit')
                <div class="d-inline-block">
                    <h5 class="text-muted">Belum Diverifikasi</h5>
                    <h2 class="mb-0">{{ $uvs }}</h2>
                </div>
                <div class="float-right icon-circle-medium  icon-box-lg  bg-danger-light mt-1">
                    <i class="fas fa-window-close fa-fw fa-sm text-danger"></i>
                </div>
                @endrole
            </div>
            <div class="card-footer text-center">
                @role('Admin')
                <a href="{{ route('user.index') }}" class="btn-primary-link">View Details</a>
                @endrole
                @role('Sekertariat')
                <a href="{{ route('validasi_surat.index') }}" class="btn-primary-link">View Details</a>
                @endrole
                @role('Unit')
                <a href="{{ route('surat_keluar.index') }}" class="btn-primary-link">View Details</a>
                @endrole
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end sales  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- new customer  -->
    <!-- ============================================================== -->
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card " style="border-top: solid 3px #00923F">
            <div class="card-body">
                @role('Admin')
                <div class="d-inline-block">
                    <h5 class="text-muted">Jumlah Unit</h5>
                    <h2 class="mb-0">{{ $junit }}</h2>
                </div>
                <div class="float-right icon-circle-medium  icon-box-lg  bg-success-light mt-1">
                    <i class="fas fas fa-users fa-fw fa-sm text-success"></i>
                </div>
                @endrole
                @role('Sekertariat')
                <div class="d-inline-block">
                    <h5 class="text-muted">Semua Kartu Kendali</h5>
                    <h2 class="mb-0">{{ $skk }}</h2>
                </div>
                <div class="float-right icon-circle-medium  icon-box-lg  bg-success-light mt-1">
                    <i class="fas fa-file-archive fa-fw fa-sm text-success"></i>
                </div>
                @endrole
                @role('Unit')
                <div class="d-inline-block">
                    <h5 class="text-muted">Sudah Diverifikasi</h5>
                    <h2 class="mb-0">{{ $vs }}</h2>
                </div>
                <div class="float-right icon-circle-medium  icon-box-lg  bg-success-light mt-1">
                    <i class="fas fa-file-archive fa-fw fa-sm text-success"></i>
                </div>
                @endrole
            </div>
            <div class="card-footer text-center">
                @role('Admin')
                <a href="{{ route('unit.index') }}" class="btn-primary-link">View Details</a>
                @endrole
                @role('Sekertariat')
                <a href="{{ route('buku_agenda.index') }}" class="btn-primary-link">View Details</a>
                @endrole
                @role('Unit')
                <a href="{{ route('surat_keluar.index') }}" class="btn-primary-link">View Details</a>
                @endrole
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end new customer  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- visitor  -->
    <!-- ============================================================== -->
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card " style="border-top: solid 3px #9400d4">
            <div class="card-body">
                <div class="d-inline-block">
                    <h5 class="text-muted">Kartu Kendali</h5>
                    <h2 class="mb-0">{{ $jkk }}</h2>
                </div>
                <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                    <i class="far fa-file-archive fa-fw fa-sm text-info"></i>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('surat_keluar.index') }}" class="btn-primary-link">View Details</a>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end visitor  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
</div>
<div class="row">
    @role('Admin')
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        @endrole
        @role('Sekertariat')
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            @endrole
            <!-- ============================================================== -->
            <!-- social source  -->
            <!-- ============================================================== -->
            <div class="card">
                @role('Admin')
                <h5 class="card-header">Jumlah User dan Unit</h5>
                @endrole
                @role('Sekertariat')
                <h5 class="card-header">Keterangan Kartu Kendali</h5>
                @endrole
                <div class="card-body p-0">
                    <ul class="social-sales list-group list-group-flush">
                        @role('Admin')
                        <li class="list-group-item social-sales-content"><span
                                class="social-sales-icon-circle facebook-bgcolor mr-2"><i
                                    class="fas fa-users"></i></span><span class="social-sales-name"><a
                                    href="{{ route('user.index') }}">Jumlah
                                    User</a>

                            </span><span class="social-sales-count text-dark">{{ $juser }}
                                User</span>
                        </li>
                        <li class="list-group-item social-sales-content"><span
                                class="social-sales-icon-circle pinterest-bgcolor mr-2"><i
                                    class="fas fa-diagnoses"></i></span><span class="social-sales-name"><a
                                    href="{{ route('unit.index') }}">Jumlah Unit</a>
                            </span><span class="social-sales-count text-dark">{{ $junit }} Unit
                            </span>
                        </li>
                        <li class="list-group-item social-sales-content"><span
                                class="social-sales-icon-circle twitter-bgcolor mr-2"><i
                                    class="fas fa-unlock-alt"></i></span><span class="social-sales-name"><a
                                    href="{{ route('role.index') }}">Jumlah
                                    Role</a>
                            </span><span class="social-sales-count text-dark">{{ $role }} Role</span>
                        </li>
                        @endrole
                        @role('Sekertariat')
                        <li class="list-group-item social-sales-content"><span
                                class="social-sales-icon-circle googleplus-bgcolor mr-2"><i
                                    class="fas fa-bars"></i></span><span class="social-sales-name">Surat
                                Internal</span><span class="social-sales-count text-dark">{{ $si }}
                                Kartu Kendali</span>
                        </li>
                        <li class="list-group-item social-sales-content"><span
                                class="social-sales-icon-circle pinterest-bgcolor mr-2"><i
                                    class="fas fa-angle-double-up"></i></span><span class="social-sales-name">Surat
                                Eksternal
                                Keluar</span><span class="social-sales-count text-dark">{{ $sek }} Kartu Kendali
                            </span>
                        </li>
                        <li class="list-group-item social-sales-content"><span
                                class="social-sales-icon-circle twitter-bgcolor mr-2"><i
                                    class="fas fa-angle-double-down"></i></span><span class="social-sales-name">Surat
                                Eksternal
                                Masuk</span><span class="social-sales-count text-dark">{{ $sem }} Kartu Kendali</span>
                        </li>
                        @endrole
                    </ul>
                </div>
                @role('Sekertariat')
                <div class="card-footer text-center">
                    <a href="{{ route('jenis_surat.index') }}" class="btn-primary-link">View Details</a>
                </div>
                @endrole
            </div>
            <!-- ============================================================== -->
            <!-- end social source  -->
            <!-- ============================================================== -->
        </div>
        @role('Sekertariat')
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <!-- ============================================================== -->
            <!-- sales traffice source  -->
            <!-- ============================================================== -->
            <div class="card">
                <h5 class="card-header">Keterangan Validasi</h5>
                @endrole
                <div class="card-body p-0">
                    <ul class="social-sales list-group list-group-flush">
                        @role('Sekertariat')
                        <li class="list-group-item social-sales-content"><span
                                class="social-sales-icon-circle facebook-bgcolor mr-2"><i
                                    class="fas fa-check-circle"></i></span><span class="social-sales-name">
                                Sudah Validasi</span><span class="social-sales-count text-dark">{{ $vs }} Kartu
                                Kendali</span>
                        </li>
                        <li class="list-group-item social-sales-content"><span
                                class="social-sales-icon-circle pinterest-bgcolor mr-2"><i
                                    class="fas fa-window-close"></i></span><span class="social-sales-name">
                                Belum Validasi</span><span class="social-sales-count text-dark">{{ $uvs }} Kartu
                                Kendali
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    @role('Sekertariat')
                    <a href="{{ route('validasi_surat.index') }}" class="btn-primary-link">View Details</a>
                    @endrole
                </div>
            </div>
        </div>
        @endrole
    </div>
</div>
</div>
</div>
@endsection