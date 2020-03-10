@extends('layouts.master')
@section('title')
<title>Manajemen Klasifikasi Dokumen</title>
@endsection
@section('content')
@section('pageheader')
Manajemen Klasifikasi Dokumen
@endsection
@section('b-item')
<li class="breadcrumb-item active" aria-current="page">Klasifikasi Dokumen
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
                <form action="{{route('klasifikasi_dokumen.store')}}" method="POST" role="form">
                    @csrf
                    <div class="form-group">
                        <label for="kode_dokumen">Kode Dokumen</label>
                        <input id="kode_dokumen"
                            class="form-control {{ $errors->has('kode_dokumen') ? 'is-invalid':'' }}" id="kode_dokumen"
                            type="text" name="kode_dokumen">
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
                List Klasifikasi Dokumen
                @endslot

                <div class="table-responsive">
                    <table class="table table-hover" id="example">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Kode Dokumen</td>
                                <td>Deskripsi</td>
                                <td>Created At</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @forelse ($dokumen as $dkm)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $dkm->kode_dokumen }}</td>
                                <td>{{ $dkm->deskripsi }}</td>
                                <td>{{ $dkm->created_at }}</td>
                                <td>
                                    <form
                                        action="{{ route('klasifikasi_dokumen.destroy', $dkm->klasifikasi_dokumen_id) }}"
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