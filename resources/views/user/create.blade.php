@extends('layouts.master')
@section('title')
<title>Manajemen User</title>
@endsection
@section('content')
@section('pageheader')
Tambah User
@endsection
@section('b-item')
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('user.index') }}">User</a>
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
                <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" required maxlength="50"
                            class=" form-control {{ $errors->has('nama_lengkap') ? 'is-invalid':'' }}">
                        <p class="text-danger">{{ $errors->first('nama_lengkap') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" required
                            class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}">
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" required maxlength="35"
                            class="form-control {{ $errors->has('username') ? 'is-invalid':'' }}">
                        <p class="text-danger">{{ $errors->first('username') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password"
                            class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}">
                        <p class="text-danger">{{ $errors->first('password') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="role" id="role" class="form-control {{ $errors->has('role') ? 'is-invalid':'' }}">
                            <option value="">Pilih</option>
                            @foreach ($role as $rl)
                            <option value="{{$rl->id}}">{{ $rl->role_name }}</option>
                            @endforeach
                        </select>
                        <p class="text-danger">{{ $errors->first('unit') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="">Unit</label>
                        <select name="unit" id="unit" class="form-control">
                            @foreach ($unit as $unt)
                            <option value="{{$unt->unit_id}}">{{ $unt->unit_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" name="photo" class="form-control">
                        <p class="text-danger">{{ $errors->first('photo') }}</p>
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