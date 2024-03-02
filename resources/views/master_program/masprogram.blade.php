@extends('layout.template')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Master Program</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Master Program</a></li>
                            <li class="breadcrumb-item active">Master Program</li>
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

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <form action="{{ route('program.index') }}">
                                <div class="input-group input-group-md">
                                    <select name="tahun" class="form-control">
                                        <option value="">Pilih Tahun</option>
                                        @php
                                            $currentYear = date('Y');
                                            $startYear = 2022;
                                        @endphp
                                        @for ($tahun = $currentYear; $tahun >= $startYear; $tahun--)
                                            <option value="{{ $tahun }}">{{ $tahun }}</option>
                                        @endfor
                                    </select>
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <a href="{{ url('program/create') }}" class="btn btn-md btn-success my-2">Tambah Data</a>
                    </div>

                    <table id="table-data" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Rekening</th>
                                <th>Program</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($program as $i => $programs)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $programs->no_rekening }}</td>
                                    <td>{{ $programs->nama_program }}</td>
                                    <td>
                                        <a href="{{ route('program.edit', $programs->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-pen" style="color: white"></i>
                                        </a>
                                        <form action="{{ route('program.destroy', $programs->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="confirm()">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    Terima Kasih
                </div>
            </div>
        </section>
    </div>
@endsection

@push('custom_css')
@endpush

@push('custom_js')
@endpush
