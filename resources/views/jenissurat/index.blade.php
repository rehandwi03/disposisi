@extends('layouts.master')
@section('title')
<title>Manajemen Jenis Surat</title>
@endsection
@section('content')
@section('pageheader')
Manajemen Jenis Surat
@endsection
@section('b-item')
<li class="breadcrumb-item active" aria-current="page">Jenis Surat
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
                <form action="{{route('jenis_surat.store')}}" method="POST" role="form">
                    @csrf
                    <div class="form-group">
                        <label for="kode_surat">Kode Surat</label>
                        <input id="kode_surat" class="form-control {{ $errors->has('kode_surat') ? 'is-invalid':'' }}"
                            id="kode_surat" type="text" name="kode_surat">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="" cols="30" rows="10"
                            class="form-control {{ $errors->has('deskripsi') ? 'is-invalid':'' }}"></textarea>
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
                List Jenis Surat
                @endslot
                <div class="table-responsive">
                    <table class="display table table-hover text-center" id="example">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Kode Surat</td>
                                <td>Deskripsi</td>
                                {{-- <td>Tanggal Pembuatan</td> --}}
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @forelse ($surat as $srt)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $srt->kode_surat }}</td>
                                <td>{{ $srt->deskripsi_surat }}</td>
                                {{-- <td>{{ $srt->created_at }}</td> --}}
                                <td>
                                    <form action="{{ route('jenis_surat.destroy', $srt->jenis_surat_id) }}"
                                        method="POST" class="form-delete" id="form-delete">
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