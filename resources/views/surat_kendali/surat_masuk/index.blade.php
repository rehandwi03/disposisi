@extends('layouts.master')
@section('title')
<title>Proses Kartu Kendali</title>
@endsection
@section('content')
@section('pageheader')
Proses Kartu Kendali
@endsection
@section('b-item')
<li class="breadcrumb-item active" aria-current="page">Proses Kartu Kendali
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
                                {{-- <th>Nomor</th>
                                <th>Kode</th> --}}
                                <th>Perihal</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @forelse ($sm as $row)
                            <tr>
                                {{-- <td>{{ $no++ }}</td> --}}
                                <td>{{ $row->kartu_kendali_id }}</td>
                                <td>{{ $row->jenis_surat->deskripsi }}</td>
                                <td>{{ $row->unit->unit_name }}</td>
                                {{-- <td>{{ $row->buku_agenda->nomor_agenda }}</td>
                                <td>{{ $row->klasifikasi_dokumen->kode_dokumen }}</td> --}}
                                <td>{{ $row->perihal }}</td>
                                <td>{{date('d F yy', strtotime($row->tanggal_pembuatan))}}
                                </td>
                                <td>
                                    <form action="" method="POST" id="form-delete" class="form-delete">
                                        @csrf
                                        <a href="{{route('surat_masuk.reply', $row->kartu_kendali_id)}}"
                                            class="badge badge-info">
                                            <i class="fas fa-reply"></i> Membalas
                                        </a>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <a href="{{route('surat_masuk.show', $row->kartu_kendali_id)}}"
                                            class="badge badge-primary">
                                            <i class="fas fa-eye"></i> Lihat
                                        </a>
                                        {{-- <button class="btn btn-danger btn-sm btn-delete">
                                            <i class="fas fa-trash"></i>
                                        </button> --}}
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