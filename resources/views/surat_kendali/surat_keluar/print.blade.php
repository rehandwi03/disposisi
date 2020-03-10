<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ public_path('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <style>
        .page-break {
            page-break-before: always;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="text-center">
            {{-- <h3 class="mb-0">Invoice #1</h3> --}}
            <img src="{{ public_path('uploads/logo/binainsani.png') }}" alt="Universitas Bina Insani" width="400">
        </div>
    </div>
    <div class="row mx-auto">
        <table>
            <tr>
                <td width=600>
                    <h5 class="mb-3">No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        {{ $sm[0]->kartu_kendali->kartu_kendali_id }}
                    </h5>
                </td>
                <td width=300>
                    <h5 class="mb-3">Kode &nbsp;&nbsp;&nbsp;&nbsp;:
                        {{ $sm[0]->kartu_kendali->klasifikasi_dokumen->kode_dokumen }}</h5>
                </td>
                {{-- <td width=300>
                    <input type="checkbox" disabled {{$checked}}> Surat Internal
                <h5 class="mb-3"></h5>
                </td> --}}
            </tr>
            <tr>
                <td>
                    <h5 class="mb-1">Perihal &nbsp;: {{$sm[0]->kartu_kendali->perihal}}</h5>
                </td>
                <td>
                    <h5 class="mb-1">Tanggal :
                        {{date('d F yy', strtotime($sm[0]->kartu_kendali->tanggal_pembuatan))}}
                    </h5>
                </td>
                {{-- <td width=300>
                    <input type="checkbox" disabled {{$checked}}> Surat Eksternal Masuk
                <h5 class="mb-3"></h5>
                </td> --}}
            </tr>
            {{-- <tr>
                <td></td>
                <td></td>

            </tr> --}}
        </table>
        <table class="mt-2">
            <tr>
                @foreach ($js as $data)
                <td width=300>
                    @php
                    $checked=($sm[0]->kartu_kendali->jenis_surat_id == $data->jenis_surat_id)?
                    "checked" : "";
                    @endphp
                    <input type="checkbox" disabled {{$checked}}> {{$data->deskripsi}}
                    <h5 class=""></h5>
                </td>
                @endforeach
            </tr>
        </table>
    </div>
    <div class="row mt-2 mx-auto">
        <div class="table-responsive-sm">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="center">Tanggal</th>
                        <th>Dari Unit</th>
                        <th>Untuk Unit</th>
                        <th class="center">Disposisi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sm as $row)
                    <tr>
                        <td class="center">{{ $row->tanggal_membalas }}</td>
                        <td class="center">{{ $row->from }}</td>
                        <td class="center">{{ $row->to }}</td>
                        <td class="center">{{ $row->disposisi }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @foreach ($sm as $data)
    @forelse ($data->lampiran as $lm)
    <div class="page-break text-center">
        <img src="{{ public_path('uploads/lampiran/'. $lm->nama_lampiran) }}" class="img-fluid ">
    </div>
    @empty
    @endforelse
    @endforeach

    <script src="{{ public_path('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>

</html>