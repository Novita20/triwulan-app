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
                        {!! isset($indikator_kinerja) ? method_field('PUT') : '' !!}

                        <div class="form-group">
                            <label>Pilih Sub Kegiatan</label>
                            <select name="subkegiatan_id" class="form-control select3">
                                <option>--PILIH--</option>
                                @foreach ($master_subkegiatan as $d)
                                    <option value="{{ $d->id }}" {{isset($indikator_kinerja) ?($indikator_kinerja->subkegiatan_id == $d->id) ? 'selected':'':''}}>{{ $d->nama_subkegiatan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Indikator</label>
                            <input class="form-control @error('indikator') is-invalid @enderror"
                                value="{{ isset($indikator_kinerja) ? $indikator_kinerja->indikator : old('indikator') }}"
                                name="indikator" type="text" />
                            @error('indikator')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Target</label>
                            <input class="form-control @error('target') is-invalid @enderror"
                                value="{{ isset($indikator_kinerja) ? $indikator_kinerja->target : old('target') }}"
                                name="target" type="number" />
                            @error('target')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Satuan</label>
                            <input class="form-control @error('satuan') is-invalid @enderror"
                                value="{{ isset($indikator_kinerja) ? $indikator_kinerja->satuan : old('satuan') }}"
                                name="satuan" type="text" />
                            @error('satuan')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Pagu (Rp)</label>
                            <input class="form-control @error('pagu') is-invalid @enderror"
                                value="{{ isset($indikator_kinerja) ? $indikator_kinerja->pagu : old('pagu') }}"
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

