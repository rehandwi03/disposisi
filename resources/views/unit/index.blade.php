@extends('layouts.master')
@section('title')
<title>Manajemen Unit</title>
@endsection
@section('content')
@section('pageheader')
Manajemen Unit
@endsection
@section('b-item')
<li class="breadcrumb-item active" aria-current="page">Unit
</li>
@endsection
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                @card
                @slot('title')
                Tambah
                @endslot
                <form action="" method="POST" role="form">
                    @csrf
                    <div class="form-group">
                        <label for="unit_name">Unit</label>
                        <input id="unit_name" class="form-control {{ $errors->has('unit_name') ? 'is-invalid':'' }}"
                            id="unit_name" type="text" name="unit_name">
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    </div>
                    @slot('footer')
                    <div class="card-footer">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
                @endslot
                @endcard
            </div>
            <div class="col-md-8">
                @card
                @slot('title')
                List Unit
                @endslot

                <div class="table-responsive">
                    <table class="table table-hover" id="example">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Nama Unit</td>
                                <td>Created At</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @forelse ($unit as $unt)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $unt->unit_name }}</td>
                                <td>{{ $unt->created_at }}</td>
                                <td>
                                    <form action="{{ route('unit.destroy', $unt->unit_id) }}" method="POST"
                                        class="form-delete" id="form-delete">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="badge badge-danger"><i class="fa fa-trash"></i> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                ​
                {{-- <div class="float-right">
                                {!! $role->links() !!}
                            </div> --}}
                @slot('footer')
                ​
                @endslot
                @endcard
            </div>
        </div>
    </div>
</section>
</div>
</div>
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