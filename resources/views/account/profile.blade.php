@extends('layouts.master')
@section('title')
<title>Account</title>
@endsection
@section('content')
@section('pageheader')
Account
@endsection
@section('b-item')
<li class="breadcrumb-item active" aria-current="page">Account
</li>
@endsection
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="user-avatar text-center d-block">
                            <img src="{{ asset('uploads/user/' . Auth::user()->photo) }}"
                                alt="Auth::user()->nama_lengkap" class="rounded-circle user-avatar-xxl">
                        </div>
                        <div class="text-center">
                            <h2 class="font-24 mb-0">{{ Auth::user()->nama_lengkap }}</h2>
                            @foreach (Auth::user()->getRoleNames() as $rl)
                            <label for="" class="badge badge-info">{{ $rl }}</label>
                            @endforeach
                            <p></p>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <h3 class="font-16 text-center">Profile Information <a href="{{ route('account.setting') }}"><i
                                    class="fas fa-pencil-alt"></i></a></h3>
                        <div class="">
                            <ul class="list-unstyled mb-0 text-center">
                                <li class="mb-2"><i class="fas fa-user-md mr-2"></i>{{ Auth::user()->username }}
                                </li>
                                <li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i>{{ Auth::user()->email }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    @endsection