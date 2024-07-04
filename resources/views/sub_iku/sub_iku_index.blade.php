@extends('layout.template')
@php
    use Illuminate\Support\Collection;
@endphp

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Indikator Kinerja Utama </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Realisasi Anggaran</a></li>
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
                    </div>

                    <a href="{{ route('sub_iku.create') }}" class="btn btn-sm btn-success my-2">
                        Tambah Data
                    </a>
                    <table class="table table-bordered table-striped">
                        <thead>
                        {{-- @dd($data) --}}
                        <tr>
                            <th colspan="14" style="text-align: center;">SUB IKU</th>
                        </tr>
                        <tr>
                            <th rowspan="2" style="align-content: center">No</th>
                            <th rowspan="2" style="align-content: center;">MISI RPJMD</th>
                            <th rowspan="2" style="align-content: center;">TUJUAN RPJMD</th>
                            <th rowspan="2" style="align-content: center;">SASARAN RPJMD</th>
                            <th rowspan="2" style="align-content: center;">TUJUAN PD</th>
                            <th rowspan="2" style="align-content: center;">SASARAN PD</th>
                            <th rowspan="2" style="align-content: center;">INDIKATOR TUJUAN / SASARAN DP</th>
                            <th rowspan="2" style="align-content: center;">FORMULA / RUMUS</th>
                            <th rowspan="2" style="align-content: center;">Kondisi Awal Kinerja Tahun 2021</th>
                            <th colspan="5" style="align-content: center;">Target Kinerja Sasaran Pada Tahun</th>
                        </tr>
                        <tr>
                            @foreach (range(date('Y'), date('Y') + 4) as $year)
                                <th>{{ $year }}</th>
                        @endforeach
                        <tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $i => $item)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $item->misi_rpjmd }}</td>
                                <td>{{ $item->tujuan_rpjmd }}</td>
                                <td>{{ $item->sasaran_rpjmd }}</td>
                                <td>{{ $item->tujuan_pd }}</td>
                                @foreach ($item->subIkuSasaran as $item_sasaran)
                                    <td>{{ $item_sasaran->sasaran_pd }}</td>
                                    <td>{{ $item_sasaran->indikator_tujuan }}</td>
                                    <td>
                                        <img class="img-size-50" src="{{ asset('storage').'/'.$item_sasaran->formula }}" alt="{{ $item_sasaran->formula }}">
                                    </td>
                                    <td>{{ $item->kondisi_awal  }}</td>

                                    @foreach (range(date('Y'), date('Y') + 4) as $year)
                                        @php
                                            $found = false;
                                        @endphp
                                        @foreach ($item_sasaran->sub_iku_kinerja as $item_kinerja)
                                            @if ($year == $item_kinerja->tahun)
                                                <td>{{ $item_kinerja->angka_kinerja }} {{ $item_kinerja->satuan }}
                                                </td>
                                                @php
                                                    $found = true;
                                                @endphp
                                            @endif
                                        @endforeach

                                        @if (!$found)
                                            <td></td>
                                        @else
                                            @break
                                        @endif
                                    @endforeach
                                @endforeach
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
        th {
        }

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
