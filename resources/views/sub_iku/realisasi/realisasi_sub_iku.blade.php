@extends('layout.template')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Realisasi Sub Iku</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('sub_iku.realisasi')}}">Realisasi Sub Iku</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">LIST</h3>
                </div>

                <div class="card-body">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <form action="/realisasi" method="GET">
                                <input type="text" id="realisasi" name="realisasi" class="form-control"
                                       placeholder="Cari...">
                            </form>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('realisasi.download') }}" class="btn btn-success">Download Excel</a>
                        </div>
                    </div>
                    <br>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th colspan="22" style="text-align: center;">Realisasi</th>
                        </tr>
                        <tr>
                            <th rowspan="3" style="text-align: center;">MISI RPJMD</th>
                            <th rowspan="3" style="text-align: center;">TUJUAN RPJMD</th>
                            <th rowspan="3" style="text-align: center;">SASARAN RPJMD</th>
                            <th rowspan="3" style="text-align: center;">INDIKATOR TUJUAN / SASARAN DP</th>
                            @foreach (range(date('Y'), date('Y') + 4) as $year)
                                <th colspan="2">{{ $year }}</th>
                            @endforeach
                            <th rowspan="3">Keterangan</th>
                            <th rowspan="3">Edit <Tahunan>      </Tahunan></th>

                        </tr>
                        <tr>
                            @php
                                for ($i=0; $i < 5; $i++):
                            @endphp
                            <th colspan="2">Kinerja</th>
                            @php
                                endfor;
                            @endphp
                        </tr>
                        <tr>
                            @php
                                for ($i=0; $i < 5; $i++):
                            @endphp
                            <th>Angka</th>
                            <th>%</th>
                            @php
                                endfor;
                            @endphp
                        </tr>

                        </thead>
                        <tbody>
                        @foreach($data as $i => $item)
                            <tr>
                                 <td>{{ $item->misi_rpjmd }}</td>
                                 <td>{{ $item->tujuan_rpjmd }}</td>
                                 <td>{{ $item->sasaran_rpjmd }}</td>
                                 <td>{{ $item->subIkuSasaran->first()->indikator_tujuan }}</td>
                                @foreach($item->subIkuKinerja as $item_kinerja)
                                    <td>{{ $item_kinerja->angka_kinerja }}</td>
                                    <td>{{ $item_kinerja->satuan }}</td>
                                @endforeach
                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    <a href="{{ route('realisasi.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('custom_css')
    <style>
        th {}

        .card {
            overflow: auto;
        }

        .table {
            overflow: auto;
        }

        th {
            text-align: center;
        }
    </style>
@endpush

@push('custom_js')
    <script>
        $(document).ready(function () {

        });
    </script>
@endpush
