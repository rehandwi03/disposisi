@extends('layouts.master')
@section('title')
<title>Validasi</title>
@endsection
@section('content')
@section('pageheader')
Validasi
@endsection
@section('b-item')
<li class="breadcrumb-item active" aria-current="page">Validasi
</li>
@endsection
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @card
                @slot('title')
                {{-- <a href="{{route('surat_keluar.create')}}" class="btn btn-primary btn-sm">
                <i class="fa fa-edit"></i> Tambah
                </a> --}}
                @endslot
                <div class="table-responsive">
                    <table class="table table-hover" id="example">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Keterangan Surat</th>
                                <th>Dari Unit</th>
                                <th>Perihal</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @forelse ($vd as $row)
                            <tr>
                                <td>{{ $row->kartu_kendali_id }}</td>
                                <td>{{ $row->jenis_surat->deskripsi }}</td>
                                <td>{{ $row->unit->unit_name }}</td>
                                <td>{{ $row->perihal }}</td>
                                <td>{{ $row->tanggal_pembuatan }}</td>
                                <td>
                                    <form>
                                        @if ($row->status_kartu_kendali == 0)
                                        <a href="{{route('verif_surat.index',$row->kartu_kendali_id)}}"
                                            class="badge badge-danger">
                                            <i class="fas fa-clone"></i> Surat
                                        </a>
                                        @else
                                        @endif
                                        {{-- @if ($row->status_kartu_kendali == 1)
                                        <a href="{{route('validasi.verif', $row->kartu_kendali_id)}}"
                                        class="badge badge-success">
                                        <i class="fas fa-clipboard-check"></i> Disposisi
                                        </a>
                                        @else
                                        @endif --}}
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada data</td>
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