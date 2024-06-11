@extends('layout.template')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Indikator Program</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Data Indikator Program</a></li>
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
                <div class="card-body">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <form action="{{ route('indikator_program.index') }}">
                                <div class="input-group input-group-sm">
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
                        <a href="{{ route('indikator_program.create') }}" class="btn btn-sm btn-success my-2">Tambah
                            Data</a>
                    </div>

                    <table id="table-data" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Rekening Program</th>
                                <th>Program</th>
                                <th>Indikator</th>
                                <th>Target</th>
                                <th>Satuan</th>
                                <th>Pagu</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($program as $i => $programs)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $programs->program->no_rekening }}</td>
                                    <td>{{ $programs->program->nama_program }}</td>
                                    <td>{{ $programs->indikator }}</td>
                                    <td>{{ $programs->target }}</td>
                                    <td>{{ $programs->satuan }}</td>
                                    <td>{{ $programs->pagu }}</td>
                                    <td>
                                        <a href="{{ route('indikator_program.edit', $programs->id) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="fas fa-pen" style="color: white"></i>
                                        </a>
                                        <form action="{{ route('indikator_program.destroy', $programs->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="confirmDelete()">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Terima Kasih
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection

@push('custom_js')
@endpush
