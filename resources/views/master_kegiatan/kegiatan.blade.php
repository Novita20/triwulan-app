@extends('layout.template')
@push('custom_css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Master Kegiatan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Master Kegiatan</a></li>
                            <li class="breadcrumb-item active">Master Kegiatan</li>
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

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <form action="{{ route('kegiatan.index') }}">
                                            <div class="input-group input-group-sm">
                                                <select name="tahun" class="form-control">
                                                    <option value="">Pilih Tahun</option>
                                                    @php
                                                        $currentYear = date('Y');
                                                        $startYear = 2022;
                                                    @endphp
                                                    @for ($tahun = $currentYear; $tahun >= $startYear; $tahun--)
                                                        <option value="{{ $tahun }}"
                                                            {{ $selected_tahun == $tahun ? 'selected' : '' }}>
                                                            {{ $tahun }}</option>
                                                    @endfor
                                                </select>
                                                <span class="input-group-append">
                                                    <button type="submit" class="btn btn-primary">Cari</button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                    <a href="{{ route('kegiatan.create') }}" class="btn btn-sm btn-success my-2">
                                        Tambah Data
                                    </a>
                                </div>

                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Rekening Program</th>
                                            <th>Nama Program</th>
                                            <th>Rekening Kegiatan</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($master_kegiatan as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->program->no_rekening }}</td>
                                                <td>{{ $item->program->nama_program }}</td>
                                                <td>{{ $item->no_rekening }}</td>
                                                <td>{{ $item->nama_kegiatan }}</td>
                                                <td>
                                                    <a href="{{ url('/kegiatan/' . $item->id . '/edit') }}"
                                                        class="btn btn-sm btn-warning"><i class="fas fa-pen"
                                                            style="color: white"></i></a>
                                                    <form method="POST" action="{{ url('/kegiatan/' . $item->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="confirmDelete()"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('custom_css')
    <style>

    </style>
@endpush

@push('custom_js')
@endpush
