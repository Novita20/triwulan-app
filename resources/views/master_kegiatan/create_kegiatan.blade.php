@extends('layout.template')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Kegiatan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Tables</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">TAMBAH</h3>

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
                    <form method="POST" action="{{ $url_form }}">
                        @csrf
                        {!! isset($master_kegiatan) ? method_field('PUT') : '' !!}

                        <div class="form-group">
                            <label>Tahun Anggaran</label>
                            <select class="form-control @error('tahun') is-invalid @enderror" name="tahun">
                                <option value="" selected disabled>Pilih Tahun</option>
                                @php
                                    $currentYear = date('Y');
                                    $startYear = 2022; // Tahun awal
                                @endphp
                                @for ($year = $currentYear; $year >= $startYear; $year--)
                                    <option value="{{ $year }}"
                                        {{ isset($master_kegiatan) && $master_kegiatan->tahun == $year ? 'selected' : '' }}>
                                        {{ $year }}</option>
                                @endfor
                            </select>
                            @error('tahun')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Pilih Program</label>
                            <select class="form-control" name="program" id="program" onchange="pilihProgram()">
                                <option selected>--PILIH--</option>
                                @foreach ($program as $p)
                                    <option value="{{ $p->id }}"
                                        {{ isset($master_kegiatan) ? ($p->nama_program == $master_kegiatan->nama_program ? 'selected' : '') : '' }}>
                                        {{ $p->nama_program }}
                                    </option>
                                @endforeach
                            </select>
                            @error('program')
                                <span class="error invalid-feedback">{{ $message }} </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Rekening Kegiatan</label>
                            <input class="form-control @error('nama') is-invalid @enderror"
                                value="{{ isset($master_kegiatan) ? $master_kegiatan->rekening_kegiatan : old('rekening_kegiatan') }}"
                                name="rekening_kegiatan" type="text" />
                            @error('rekening_kegiatan')
                                <span class="error invalid-feedback">{{ $message }} </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Nama Kegiatan</label>
                            <input class="form-control @error('nama_kegiatan') is-invalid @enderror"
                                value="{{ isset($master_kegiatan) ? $master_kegiatan->nama_kegiatan : old('nama_kegiatan') }}"
                                name="nama_kegiatan" type="text" />
                            @error('nama_kegiatan')
                                <span class="error invalid-feedback">{{ $message }} </span>
                            @enderror
                        </div>

                        <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
                <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection

@push('custom_css')
    <style>
        th {}

        /* .card{
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          background:green;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          color:aliceblue;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          transition: 0.5s;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      }

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      .card:hover{
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          background: aqua;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          color: blue;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          transform:scale(0.9);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      } */
    </style>
@endpush

@push('custom_js')
    {{-- <script>
  alert('Halaman Home')
</script> --}}
@endpush
