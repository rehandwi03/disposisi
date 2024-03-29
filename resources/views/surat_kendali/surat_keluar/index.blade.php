@extends('layouts.master')
@section('title')
<title>Pengajuan Kartu Kendali</title>
@endsection
@section('content')
@section('pageheader')
Pengajuan Kartu Kendali
@endsection
@section('b-item')
<li class="breadcrumb-item active" aria-current="page">Pengajuan Kartu Kendali
</li>
@endsection
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @card
                @slot('title')
                <a href="{{route('surat_keluar.create')}}" class="btn btn-primary btn-sm">
                    <i class="fa fa-edit"></i> Tambah
                </a>
                @endslot
                <div class="table-responsive">
                    <table class="table table-hover display" id="example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Keterangan Surat</th>
                                <th>Untuk Unit</th>
                                {{-- <th>Nomor</th>
                                <th>Kode</th> --}}
                                <th>Perihal</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @forelse ($sk as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    @php
                                    if ($row->status_kartu_kendali === 3) {
                                    $status = 'success';
                                    $pesan = 'Selesai';
                                    }elseif ($row->status_kartu_kendali === 2) {
                                    $status = 'danger';
                                    $pesan = 'Verifikasi Ditolak';
                                    }elseif ($row->status_kartu_kendali === 1) {
                                    $status = 'primary';
                                    $pesan = 'Proses';
                                    }else{
                                    $status = 'danger';
                                    $pesan = 'Verifikasi';
                                    }
                                    @endphp
                                    <sup class="label label-{{$status}}">{{$pesan}}</sup>
                                    {{ $row->jenis_surat->deskripsi_surat }}
                                </td>
                                <td>{{ $row->isi_kartu[0]->to }}</td>
                                {{-- <td>{{ $row->buku_agenda->nomor_agenda }}</td>
                                <td>{{ $row->klasifikasi_dokumen->kode_dokumen }}</td> --}}
                                <td>{{ $row->perihal }}</td>
                                <td>{{date('d F yy', strtotime($row->tanggal_pembuatan))}}
                                <td>
                                    <form action="{{ route('surat_keluar.selesai', $row->kartu_kendali_id) }}"
                                        method="POST" class="form-check">
                                        @csrf
                                        @method('PUT')
                                        @if ($row->status_kartu_kendali === 3)
                                        <a href="{{ route('surat_masuk.show', $row->kartu_kendali_id) }}"
                                            class="badge badge-primary"><i class="fas fa-clipboard-list"></i>
                                            Tampil</a>
                                        <a href="{{route('surat_keluar.cetak', $row->kartu_kendali_id)}}"
                                            class="badge badge-success"><i class="fas fa-print"></i>
                                            Cetak</a>
                                        @elseif($row->status_kartu_kendali === 1)
                                        <button class="badge badge-success" type="submit"><i class="fa fa-check"></i>
                                            Selesaikan</button>
                                        @else

                                        @endif
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
        $('.form-check').on('submit', function(e){
            var form = this;
            e.preventDefault();
            Swal.fire({
                // title: 'Apa anda yakin ingin menghapus data ?',
                text: "Anda yakin ingin menyelesaikan surat ?",
                type: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Selesai'
            }).then((result) => {
                if (result.value) {
                    return form.submit();
                }
            })
        });
</script>
@endsection