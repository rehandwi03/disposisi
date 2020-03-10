@extends('layouts.master')
@section('title')
<title>Account Setting</title>
@endsection
@section('content')
@section('pageheader')
Account Setting
@endsection
@section('b-item')
<li class="breadcrumb-item" aria-current="page">Account
</li>
<li class="breadcrumb-item active" aria-current="page">Setting
</li>
@endsection
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-1">Form Pengaturan Akun</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="text" name="username"
                                    placeholder="Username" autocomplete="off" value="{{ $user->username }}">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-lg" id="pass1" type="password"
                                    placeholder="Password" name="password">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-lg" placeholder="Konfirmasi Password"
                                    type="password" name="password_confirmation">
                            </div>
                            <div class="form-group">
                                <label for="">Foto</label>
                                <input type="file" name="photo" class="form-control">
                                <p class="text-danger">{{ $errors->first('photo') }}</p>
                            </div>
                            <div class="form-group pt-2">
                                <button class="btn btn-block btn-primary" type="submit">Ubah</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    @endsection