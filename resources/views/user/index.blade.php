@extends('layouts.master')
@section('title')
<title>Manajemen User</title>
@endsection
@section('content')
@section('pageheader')
Manajemen User
@endsection
@section('b-item')
<li class="breadcrumb-item active" aria-current="page">User
</li>
@endsection
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @card
                @slot('title')
                <a href="{{route('user.create')}}" class="btn btn-primary btn-sm">
                    <i class="fa fa-edit"></i> Tambah
                </a>
                @endslot

                <div class="table-responsive">
                    <table class="table table-hover" id="example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>Unit Bagian</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($user as $row)
                            <tr>
                                <td>
                                    @if (!empty($row->photo))
                                    <img src="{{ asset('uploads/user/' . $row->photo) }}" alt="{{ $row->name }}"
                                        width="50px" height="50px">
                                    @else
                                    <img src="http://via.placeholder.com/50x50" alt="{{ $row->name }}">
                                    @endif
                                </td>
                                <td>{{ $row->nama_lengkap }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->unit->unit_name }}</td>
                                <td>
                                    @foreach ($row->getRoleNames() as $role)
                                    {{-- @php
                                    dd($role);
                                    @endphp --}}
                                    <label for="" class="badge badge-info">{{ $role }}</label>
                                    @endforeach
                                </td>
                                <td>
                                    <form action="{{route('user.destroy', $row->model_id)}}" method="POST"
                                        id="form-delete" class="form-delete">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <a href="{{ route('user.edit', $row->model_id) }}" class="badge badge-warning">
                                            <i class="fa fa-edit"></i> Ubah
                                        </a>
                                        <button class="badge badge-danger"><i class="fa fa-trash"></i> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
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