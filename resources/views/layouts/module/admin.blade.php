@extends('layouts.master')
@section('title')
<title>Home</title>
@endsection
@section('content')
@section('pageheader')
HALAMAN UTAMA
@endsection
{{-- @section('b-item')
<li class="breadcrumb-item active" aria-current="page">Dashboard
</li>
@endsection --}}
{{-- <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">E-commerce Dashboard Template </h2>
                    <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">E-Commerce Dashboard Template</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div> --}}
<!-- ============================================================== -->
<!-- end pageheader  -->
<!-- ============================================================== -->
{{-- <div class="ecommerce-widget">

            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-muted">Total Revenue</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">$12099</h1>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                            </div>
                        </div>
                        <div id="sparkline-revenue"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-muted">Affiliate Revenue</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">$12099</h1>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                            </div>
                        </div>
                        <div id="sparkline-revenue2"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-muted">Refunds</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">0.00</h1>
                            </div>
                            <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                <span>N/A</span>
                            </div>
                        </div>
                        <div id="sparkline-revenue3"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-muted">Avg. Revenue Per User</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">$28000</h1>
                            </div>
                            <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                                <span>-2.00%</span>
                            </div>
                        </div>
                        <div id="sparkline-revenue4"></div>
                    </div>
                </div>
            </div>
            <div class="row"> --}}
<!-- ============================================================== -->

<!-- ============================================================== -->

<!-- recent orders  -->
<!-- ============================================================== -->
{{-- <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Recent Orders</h5>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">#</th>
                                            <th class="border-0">Image</th>
                                            <th class="border-0">Product Name</th>
                                            <th class="border-0">Product Id</th>
                                            <th class="border-0">Quantity</th>
                                            <th class="border-0">Price</th>
                                            <th class="border-0">Order Time</th>
                                            <th class="border-0">Customer</th>
                                            <th class="border-0">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <div class="m-r-10"><img src="{{ asset('assets/images/product-pic.jpg') }}"
alt="user" class="rounded" width="45"></div>
</td>
<td>Product #1 </td>
<td>id000001 </td>
<td>20</td>
<td>$80.00</td>
<td>27-08-2018 01:22:12</td>
<td>Patricia J. King </td>
<td><span class="badge-dot badge-brand mr-1"></span>InTransit </td>
</tr>
<tr>
    <td>2</td>
    <td>
        <div class="m-r-10"><img src="{{ asset('assets/images/product-pic-2.jpg') }}" alt="user" class="rounded"
                width="45"></div>
    </td>
    <td>Product #2 </td>
    <td>id000002 </td>
    <td>12</td>
    <td>$180.00</td>
    <td>25-08-2018 21:12:56</td>
    <td>Rachel J. Wicker </td>
    <td><span class="badge-dot badge-success mr-1"></span>Delivered </td>
</tr>
<tr>
    <td>3</td>
    <td>
        <div class="m-r-10"><img src="{{ asset('assets/images/product-pic-3.jpg') }}" alt="user" class="rounded"
                width="45"></div>
    </td>
    <td>Product #3 </td>
    <td>id000003 </td>
    <td>23</td>
    <td>$820.00</td>
    <td>24-08-2018 14:12:77</td>
    <td>Michael K. Ledford </td>
    <td><span class="badge-dot badge-success mr-1"></span>Delivered </td>
</tr>
<tr>
    <td>4</td>
    <td>
        <div class="m-r-10"><img src="{{ asset('assets/images/product-pic-4.jpg') }}" alt="user" class="rounded"
                width="45"></div>
    </td>
    <td>Product #4 </td>
    <td>id000004 </td>
    <td>34</td>
    <td>$340.00</td>
    <td>23-08-2018 09:12:35</td>
    <td>Michael K. Ledford </td>
    <td><span class="badge-dot badge-success mr-1"></span>Delivered </td>
</tr>
<tr>
    <td colspan="9"><a href="#" class="btn btn-outline-light float-right">View Details</a></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
<!-- ============================================================== -->
<!-- end recent orders  -->


<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- customer acquistion  -->
<!-- ============================================================== -->
<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Customer Acquisition</h5>
        <div class="card-body">
            <div class="ct-chart ct-golden-section" style="height: 354px;"></div>
            <div class="text-center">
                <span class="legend-item mr-2">
                    <span class="fa-xs text-primary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                    <span class="legend-text">Returning</span>
                </span>
                <span class="legend-item mr-2">

                    <span class="fa-xs text-secondary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                    <span class="legend-text">First Time</span>
                </span>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- end customer acquistion  -->
<!-- ============================================================== -->
</div> --}}
{{-- <div class="row">
                <!-- ============================================================== -->
                                          <!-- product category  -->
                <!-- ============================================================== -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header"> Product Category</h5>
                        <div class="card-body">
                            <div class="ct-chart-category ct-golden-section" style="height: 315px;"></div>
                            <div class="text-center m-t-40">
                                <span class="legend-item mr-3">
                                        <span class="fa-xs text-primary mr-1 legend-tile"><i class="fa fa-fw fa-square-full "></i></span><span class="legend-text">Man</span>
                                </span>
                                <span class="legend-item mr-3">
                                    <span class="fa-xs text-secondary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                <span class="legend-text">Woman</span>
                                </span>
                                <span class="legend-item mr-3">
                                    <span class="fa-xs text-info mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                <span class="legend-text">Accessories</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div> --}}
<!-- ============================================================== -->
<!-- end product category  -->
<!-- product sales  -->
<!-- ============================================================== -->
{{-- <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- <div class="float-right">
                                    <select class="custom-select">
                                        <option selected>Today</option>
                                        <option value="1">Weekly</option>
                                        <option value="2">Monthly</option>
                                        <option value="3">Yearly</option>
                                    </select>
                                </div> -->
                            <h5 class="mb-0"> Product Sales</h5>
                        </div>
                        <div class="card-body">
                            <div class="ct-chart-product ct-golden-section"></div>
                        </div>
                    </div>
                </div> --}}
<!-- ============================================================== -->
<!-- end product sales  -->
<!-- ============================================================== -->
{{-- <div class="col-xl-3 col-lg-12 col-md-6 col-sm-12 col-12">
                    <!-- ============================================================== -->
                    <!-- top perfomimg  -->
                    <!-- ============================================================== -->
                    <div class="card">
                        <h5 class="card-header">Top Performing Campaigns</h5>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table no-wrap p-table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">Campaign</th>
                                            <th class="border-0">Visits</th>
                                            <th class="border-0">Revenue</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Campaign#1</td>
                                            <td>98,789 </td>
                                            <td>$4563</td>
                                        </tr>
                                        <tr>
                                            <td>Campaign#2</td>
                                            <td>2,789 </td>
                                            <td>$325</td>
                                        </tr>
                                        <tr>
                                            <td>Campaign#3</td>
                                            <td>1,459 </td>
                                            <td>$225</td>
                                        </tr>
                                        <tr>
                                            <td>Campaign#4</td>
                                            <td>5,035 </td>
                                            <td>$856</td>
                                        </tr>
                                        <tr>
                                            <td>Campaign#5</td>
                                            <td>10,000 </td>
                                            <td>$1000</td>
                                        </tr>
                                        <tr>
                                            <td>Campaign#5</td>
                                            <td>10,000 </td>
                                            <td>$1000</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <a href="#" class="btn btn-outline-light float-right">Details</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end top perfomimg  -->
                    <!-- ============================================================== -->
                </div>
            </div> --}}

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
                    <h5 class="text-muted">Belum Validasi</h5>
                    <h2 class="mb-0"> {{ $uvs }}</h2>
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
            </div>
            <div class="card-footer text-center">
                @role('Admin')
                <a href="{{ route('unit.index') }}" class="btn-primary-link">View Details</a>
                @endrole
                @role('Sekertariat')
                <a href="{{ route('buku_agenda.index') }}" class="btn-primary-link">View Details</a>
                @endrole
            </div>
        </div>
    </div>
    {{-- <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h5 class="text-muted">New Customer</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1">1245</h1>
                </div>
                <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                    <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i
                            class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">10%</span>
                </div>
            </div>
        </div>
    </div> --}}
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
    <!-- total orders  -->
    <!-- ============================================================== -->
    {{-- <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
        <div class="card " style="border-top: solid 3px #d44e00">
            <div class="card-body">
                <div class="row ">
                    <div class="col-sm-8 mt-4">
                        <h5 class="text-muted">Kartu Kendali</h5>
                    </div>
                    <div class="col-sm-4 text-center mt-3">
                        <div class="metric-value d-inline-block">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div>&nbsp;</div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- ============================================================== -->
    <!-- end total orders  -->
    <!-- ============================================================== -->
</div>
<div class="row">
    <!-- ============================================================== -->
    <!-- total revenue  -->
    <!-- ============================================================== -->


    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- category revenue  -->
    <!-- ============================================================== -->
    {{-- <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Revenue by Category</h5>
            <div class="card-body">
                <div id="c3chart_category" style="height: 420px;"></div>
            </div>
        </div>
    </div> --}}
    <!-- ============================================================== -->
    <!-- end category revenue  -->
    <!-- ============================================================== -->

    {{-- <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header"> Total Revenue</h5>
            <div class="card-body">
                <div id="morris_totalrevenue"></div>
            </div>
            <div class="card-footer">
                <p class="display-7 font-weight-bold"><span class="text-primary d-inline-block">$26,000</span><span
                        class="text-success float-right">+9.45%</span></p>
            </div>
        </div>
    </div> --}}
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
                        {{-- <li class="list-group-item social-sales-content"><span
                            class="social-sales-icon-circle pinterest-bgcolor mr-2"><i
                                class="fab fa-pinterest-p"></i></span><span
                            class="social-sales-name">Pinterest</span><span class="social-sales-count text-dark">56
                            Sales</span>
                    </li>
                    <li class="list-group-item social-sales-content"><span
                            class="social-sales-icon-circle googleplus-bgcolor mr-2"><i
                                class="fab fa-google-plus-g"></i></span><span class="social-sales-name">Google
                            Plus</span><span class="social-sales-count text-dark">36 Sales</span>
                    </li> --}}
                    </ul>
                </div>
                <div class="card-footer text-center">
                    @role('Sekertariat')
                    <a href="{{ route('jenis_surat.index') }}" class="btn-primary-link">View Details</a>
                    @endrole
                </div>
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
                        {{-- <li class="list-group-item social-sales-content"><span
                        class="social-sales-icon-circle pinterest-bgcolor mr-2"><i
                        class="fab fa-pinterest-p"></i></span><span
                        class="social-sales-name">Pinterest</span><span class="social-sales-count text-dark">56
                            Sales</span>
                        </li>
                        <li class="list-group-item social-sales-content"><span
                            class="social-sales-icon-circle googleplus-bgcolor mr-2"><i
                            class="fab fa-google-plus-g"></i></span><span class="social-sales-name">Google
                                Plus</span><span class="social-sales-count text-dark">36 Sales</span>
                            </li> --}}
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
        <!-- ============================================================== -->
        <!-- end sales traffice source  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- sales traffic country source  -->
        <!-- ============================================================== -->
        {{-- <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Sales By Country Traffic Source</h5>
            <div class="card-body p-0">
                <ul class="country-sales list-group list-group-flush">
                    <li class="country-sales-content list-group-item"><span class="mr-2"><i
                                class="flag-icon flag-icon-us" title="us" id="us"></i> </span>
                        <span class="">United States</span><span class="float-right text-dark">78%</span>
                    </li>
                    <li class="list-group-item country-sales-content"><span class="mr-2"><i
                                class="flag-icon flag-icon-ca" title="ca" id="ca"></i></span><span
                            class="">Canada</span><span class="float-right text-dark">7%</span>
                    </li>
                    <li class="list-group-item country-sales-content"><span class="mr-2"><i
                                class="flag-icon flag-icon-ru" title="ru" id="ru"></i></span><span
                            class="">Russia</span><span class="float-right text-dark">4%</span>
                    </li>
                    <li class="list-group-item country-sales-content"><span class=" mr-2"><i
                                class="flag-icon flag-icon-in" title="in" id="in"></i></span><span
                            class="">India</span><span class="float-right text-dark">12%</span>
                    </li>
                    <li class="list-group-item country-sales-content"><span class=" mr-2"><i
                                class="flag-icon flag-icon-fr" title="fr" id="fr"></i></span><span
                            class="">France</span><span class="float-right text-dark">16%</span>
                    </li>
                </ul>
            </div>
            <div class="card-footer text-center">
                <a href="#" class="btn-primary-link">View Details</a>
            </div>
        </div>
    </div> --}}
        <!-- ============================================================== -->
        <!-- end sales traffice country source  -->
        <!-- ============================================================== -->
    </div>
</div>
</div>
</div>
@endsection