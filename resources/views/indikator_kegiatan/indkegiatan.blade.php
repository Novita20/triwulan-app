@extends('layout.template')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Indikator Kegiatan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Indikator Kegiatan</li>
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
                                        <form action="{{ route('indikator_kegiatan.index') }}">
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
                                    <a href="{{ route('indikator_kegiatan.create') }}" class="btn btn-sm btn-success my-2">
                                        Tambah Data
                                    </a>
                                </div>

                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Rekening Kegiatan</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Indikator</th>
                                            <th>Target</th>
                                            <th>Satuan</th>
                                            <th>Pagu Anggaran (Rp)</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kegiatan as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->kegiatan->no_rekening }}</td>
                                                <td>{{ $item->kegiatan->nama_kegiatan }}</td>
                                                <td>{{ $item->indikator }}</td>
                                                <td>{{ $item->target }}</td>
                                                <td>{{ $item->satuan }}</td>
                                                <td>{{ $item->pagu }}</td>
                                                <td>
                                                    <a href="{{ url('/kegiatan/' . $item->id . '/edit') }}"
                                                        class="btn btn-sm btn-warning">edit</a>
                                                    <form method="POST" action="{{ url('/kegiatan/' . $item->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="confirmDelete()">hapus</button>
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

@push('custom_js')
@endpush
