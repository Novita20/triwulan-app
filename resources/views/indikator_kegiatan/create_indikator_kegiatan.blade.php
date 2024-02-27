@extends('layout.template')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <!-- Bagian Header Content -->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">TAMBAH</h3>
                    <!-- Bagian Tombol pada Header Card -->
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ $url_form }}">
                        @csrf
                        {!! isset($indikator_kegiatan) ? method_field('PUT') : '' !!}

                        <div class="form-group">
                            <label>Pilih Kegiatan</label>
                            <select name="kegiatan" class="form-control select3">
                                <option>--PILIH--</option>
                                @foreach ($master_kegiatan as $d)
                                    <option value="{{ $d->id }}">{{ $d->nama_kegiatan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Indikator</label>
                            <input class="form-control @error('ind') is-invalid @enderror"
                                value="{{ isset($indikator_kegiatan) ? $indikator_kegiatan->indikator : old('ind') }}"
                                name="ind" type="text" />
                            @error('ind')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Target</label>
                            <input class="form-control @error('target') is-invalid @enderror"
                                value="{{ isset($indikator_kegiatan) ? $indikator_kegiatan->target : old('target') }}"
                                name="target" type="number" />
                            @error('target')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Satuan</label>
                            <input class="form-control @error('satuan') is-invalid @enderror"
                                value="{{ isset($indikator_kegiatan) ? $indikator_kegiatan->satuan : old('satuan') }}"
                                name="satuan" type="text" />
                            @error('satuan')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Pagu (Rp)</label>
                            <input class="form-control @error('pagu') is-invalid @enderror"
                                value="{{ isset($indikator_kegiatan) ? $indikator_kegiatan->pagu : old('pagu') }}"
                                name="pagu" type="text" />
                            @error('pagu')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('custom_css')
    <style>
        /* Tambahkan gaya CSS kustom Anda di sini */
    </style>
@endpush

@push('custom_js')
    {{-- <script>
        // Tambahkan kode JavaScript kustom Anda di sini
    </script> --}}
@endpush
