@extends('layout.template')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Realisasi Anggaran</h1>
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
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th colspan="14" style="text-align: center;">Realisasi</th>
                            </tr>
                            <tr>
                                <th rowspan="2" style="text-align: center;">Program</th>
                                <th rowspan="2" style="text-align: center;">Sub Kegiatan</th>
                                <th rowspan="2" style="text-align: center;">Target</th>
                                <th rowspan="2" style="text-align: center;">Pagu</th>
                                <th colspan="2">Triwulan 1</th>
                                <th colspan="2">Triwulan 2</th>
                                <th colspan="2">Triwulan 3</th>
                                <th colspan="2">Triwulan 4</th>
                                <th rowspan="2">Keterangan</th>
                                <th rowspan="2">Edit Triwulan</th>
                            </tr>
                            <tr>
                                <th>Kinerja</th>
                                <th>Anggaran</th>
                                <th>Kinerja</th>
                                <th>Anggaran</th>
                                <th>Kinerja</th>
                                <th>Anggaran</th>
                                <th>Kinerja</th>
                                <th>Anggaran</th>
                            <tr>

                        </thead>
                        <tbody>
                            @if ($data->count() > 0)
                                @foreach ($data as $realisasi)
                                    <tr>
                                        <td>{{ $realisasi->first()->indkinerja->subkegiatan->kegiatan->program->nama_program }}
                                        </td>
                                        <td>{{ $realisasi->first()->indkinerja->subkegiatan->nama_subkegiatan }}</td>
                                        <td>{{ $realisasi->first()->indkinerja->target }}</td>
                                        <td>{{ $realisasi->first()->indkinerja->pagu }}</td>
                                        @foreach ($realisasi as $item)
                                            <td>{{ $item->kinerja }}</td>
                                            <td>{{ $item->realisasi_anggaran }}</td>
                                        @endforeach
                                        <td>
                                            <button class="btn btn-sm btn-warning modal_keterangan"
                                                id-kinerja={{ $realisasi->first()->kinerja_id }}>Keterangan</button>
                                        </td>
                                        {{-- <td>
                                            @foreach ($realisasi as $i => $item)
                                                <button realisasi-id="{{ $item->id }}" {{ $pengaturan[$i]['status'] == 0 ? 'disabled' : '' }} 
                                                    class="btn btn-sm {{ $pengaturan[$i]['status'] == 0 ? 'btn-secondary' : 'btn-success' }} edit-button">{{ ++$i }}</button>
                                            @endforeach
                                        </td> --}}
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="14" class="text-center">Data tidak ada</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    {{-- Modal Edit --}}
    <div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_edit_label"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('realisasi.update') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="realisasi_id" id="realisasi_id">
                        <div class="form-group">
                            <label>Kinerja</label>
                            <input class="form-control @error('kinerja') is-invalid @enderror" name="kinerja" type="text"
                                id="kinerja" />
                            @error('kinerja')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Satuan</label>
                            <input class="form-control @error('satuan') is-invalid @enderror" name="satuan" type="text"
                                id="satuan" />
                            @error('satuan')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Realisasi Anggaran</label>
                            <input class="form-control @error('realisasi_anggaran') is-invalid @enderror"
                                name="realisasi_anggaran" type="text" id="realisasi_anggaran" />
                            @error('realisasi_anggaran')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Faktor Pendorong</label>
                            <input class="form-control @error('faktor_pendorong') is-invalid @enderror"
                                name="faktor_pendorong" type="text" id="faktor_pendorong" />
                            @error('faktor_pendorong')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Faktor Penghambat</label>
                            <input class="form-control @error('faktor_penghambat') is-invalid @enderror"
                                name="faktor_penghambat" type="text" id="faktor_penghambat" />
                            @error('faktor_penghambat')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Masalah</label>
                            <input class="form-control @error('masalah') is-invalid @enderror" name="masalah"
                                type="text" id="masalah" />
                            @error('masalah')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Solusi</label>
                            <input class="form-control @error('solusi') is-invalid @enderror" name="solusi"
                                type="text" id="solusi" />
                            @error('solusi')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Keterangan --}}
    <div class="modal fade" id="modal_keterangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">EDIT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row form-container">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
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

@push('custom_js')
    <script>
        $(document).ready(function() {
            $('.edit-button').on('click', function() {
                var realisasi_id = $(this).attr('realisasi-id');
                $('#modal_edit').modal('show')

                $.get('/get_realisasi/' + realisasi_id).done(function(data) {
                    $('#modal_edit_label').text('Edit Data Triwulan ' + data.triwulan)
                    $('#realisasi_id').val(data.id)
                    $('#kinerja').val(data.kinerja)
                    $('#satuan').val(data.satuan)
                    $('#realisasi_anggaran').val(data.realisasi_anggaran)
                    $('#faktor_pendorong').val(data.faktor_pendorong)
                    $('#faktor_penghambat').val(data.faktor_penghambat)
                    $('#masalah').val(data.masalah)
                    $('#solusi').val(data.solusi)
                })
            })

            $('.modal_keterangan').on('click', function() {
                $('#modal_keterangan').modal('show')
                var kinerja_id = $(this).attr('id-kinerja')

                $.ajax({
                    url: '{{ route('getrealisasi') }}',
                    method: 'GET',
                    data: {
                        '_method': '{{ csrf_token() }}',
                        'kinerja_id': kinerja_id,
                    },
                    success: function(data) {
                        $.each(data, function(index, realisasi) {
                            var form = $('<div class="col-6">')
                            form.append('<form>');
                            form.append('<h5 class="text-center"><b>Triwulan ' + (
                                index + 1) + '</b></h5>');
                            form.append(
                                '<input type="hidden" id=hidden" id="realisasi_id" value="' +
                                realisasi.id + '" disabled>');
                            form.append(
                                '<div class="form-group"><label>Kinerja</label><input class="form-control" name="kinerja" type="text" value="' +
                                realisasi.kinerja + '" disabled></div>');
                            form
                                .append(
                                    '<div class="form-group"><label>Satuan</label><input class="form-control" name="satuan" type="text" value="' +
                                    realisasi.satuan + '" disabled></div>');
                            form
                                .append(
                                    '<div class="form-group"><label>Realisasi Anggaran</label><input class="form-control" name="realisasi_anggaran" type="text" value="' +
                                    realisasi.realisasi_anggaran +
                                    '" disabled></div>');
                            form.append(
                                '<div class="form-group"><label>Faktor Pendorong</label><input class="form-control" name="faktor_pendorong" type="text" value="' +
                                realisasi.faktor_pendorong + '" disabled></div>'
                            );
                            form.append(
                                '<div class="form-group"><label>Faktor Penghambat</label><input class="form-control" name="faktor_penghambat" type="text" value="' +
                                realisasi.faktor_penghambat +
                                '" disabled></div>');
                            form.append(
                                '<div class="form-group"><label>Masalah</label><input class="form-control" name="masalah" type="text" value="' +
                                realisasi.masalah + '" disabled></div>');
                            form
                                .append(
                                    '<div class="form-group"><label>Solusi</label><input class="form-control" name="solusi" type="text" value="' +
                                    realisasi.solusi + '" disabled></div>');
                            form
                                .append('</div>')
                            $('.form-container').append(form);
                        });
                    }
                })

                $('#submit-form').on('click', function() {

                })
            })
        })

        $(document).ready(function() {});
    </script>
@endpush
