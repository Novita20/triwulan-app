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
                </div>

                <div class="card-body">
                    <form action="{{ $url_form }}" method="POST">
                        @csrf
                        {!! isset($indikator_program) ? method_field('PUT') : '' !!}

                        <div class="form-group">
                            <label>Misi RPJMD</label>
                            <input class="form-control @error('misi') is-invalid @enderror"
                                value="{{ isset($indikator_program) ? $indikator_program->indikator : old('misi') }}"
                                name="misi" type="text" />
                            @error('misi')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Tujuan RPJMD</label>
                            <input class="form-control @error('tujuanrp') is-invalid @enderror"
                                value="{{ isset($indikator_program) ? $indikator_program->tujuanrp : old('tujuan') }}"
                                name="tujuan" type="text" />
                            @error('tujuanrp')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Sasaran RPJMD</label>
                            <input class="form-control @error('sasaranrp') is-invalid @enderror"
                                value="{{ isset($indikator_program) ? $indikator_program->sasaranrp : old('tujuan') }}"
                                name="tujuan" type="text" />
                            @error('sasaranrp')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tujuan PD</label>
                            <input class="form-control @error('tujuanpd') is-invalid @enderror"
                                value="{{ isset($indikator_program) ? $indikator_program->tujuanpd : old('tujuan') }}"
                                name="tujuan" type="text" />
                            @error('tujuanpd')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Sasaran PD</label>
                            <input class="form-control @error('sasaranpd') is-invalid @enderror"
                                value="{{ isset($indikator_program) ? $indikator_program->sasaranpd : old('tujuan') }}"
                                name="tujuan" type="text" />
                            @error('sasaranpd')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Indikator Tujuan / Sasaran PD</label>
                            <input class="form-control @error('indikator') is-invalid @enderror"
                                value="{{ isset($indikator_program) ? $indikator_program->indikator : old('tujuan') }}"
                                name="tujuan" type="text" />
                            @error('indikator')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Upload Formula/Rumus</label>
                            <input class="form-control-file @error('formula') is-invalid @enderror" name="formula"
                                type="file" accept="image/*" />
                            @error('formula')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Kondisi Awal Kinerja Tahun 2021</label>
                            <input class="form-control @error('kondisi') is-invalid @enderror"
                                value="{{ isset($indikator_program) ? $indikator_program->kondisi : old('tujuan') }}"
                                name="tujuan" type="text" />
                            @error('kondisi')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Target Kinerja Sasaran -->
                        <div class="form-group">
                            <label>Target Kinerja Sasaran</label>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Tahun</th>
                                        <th>Angka Kinerja</th>
                                        <th>Satuan Kinerja</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <tr>
                                            <td>
                                                <select
                                                    class="form-control @error('tahun_{{ $i }}') is-invalid @enderror"
                                                    name="tahun_{{ $i }}">
                                                    @foreach (range(date('Y'), date('Y') + 10) as $year)
                                                        <option value="{{ $year }}">{{ $year }}</option>
                                                    @endforeach
                                                </select>
                                                @error('tahun_{{ $i }}')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input
                                                    class="form-control @error('target_number_{{ $i }}') is-invalid @enderror"
                                                    name="target_number_{{ $i }}" type="number" />
                                                @error('target_number_{{ $i }}')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input
                                                    class="form-control @error('deskripsi_{{ $i }}') is-invalid @enderror"
                                                    name="deskripsi_{{ $i }}" type="text" />
                                                @error('deskripsi_{{ $i }}')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
