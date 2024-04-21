@extends('layout.template')

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
                                <input type="realisasi" id="realisasi" name="realisasi" class="form-control"
                                    placeholder="Cari...">
                            </form>
                        </div>
                    </div>

                    <a href="{{ route('sub_iku.create') }}" class="btn btn-sm btn-success my-2">
                        Tambah Data
                    </a>
                    <table class="table table-bordered table-striped">
                        <thead>
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
                                <th>2022</th>
                                <th>2023</th>
                                <th>2024</th>
                                <th>2025</th>
                                <th>2026</th>
                            <tr>

                        </thead>
                        <tbody>

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
