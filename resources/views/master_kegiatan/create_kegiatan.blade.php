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
                            <li class="breadcrumb-item"><a href="#">Master Program</a></li>
                            <li class="breadcrumb-item active">Master Program</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ $url_form }}">
                        @csrf
                        {!! isset($master_kegiatan) ? method_field('PUT') : '' !!}
                        <div class="form-group">
                            <label>Pilih Tahun</label>
                            <select class="form-control pilih-tahun" name="tahun">
                                <option value="" selected>--PILIH--</option>
                                @foreach ($tahun as $t)
                                    <option
                                        value="{{ $t }}"{{ isset($master_kegiatan) ? ($master_kegiatan->program->tahun == $t ? 'selected' : '') : '' }}>
                                        {{ $t }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @isset($master_kegiatan)
                            <input type="hidden" id="program-id" value="{{ $master_kegiatan->program_id }}">
                        @endisset
                        <div class="form-group">
                            <label>Pilih Program</label>
                            <select class="form-control" name="program" id="program">
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Rekening Kegiatan</label>
                            <input class="form-control @error('no_rekening') is-invalid @enderror"
                                value="{{ isset($master_kegiatan) ? $master_kegiatan->no_rekening : old('no_rekening') }}"
                                name="no_rekening" type="text" />
                            @error('no_rekening')
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

@push('custom_js')
    <script>
        $(document).ready(function() {
            var program_id = $('#program-id').val();
            var tahun = $('.pilih-tahun').val();

            $.ajax({
                url: '/get_program/',
                type: 'GET',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'tahun': tahun
                },
                dataType: 'json',
                success: function(data) {
                    if (data) {
                        $('#program').empty();
                        $.each(data, function(index,
                            program) {
                            var selected = (program.id == program_id) ? 'selected' : '';
                            $('#program').append('<option value="' +
                                program.id + '" ' + selected + '>' + program.nama_program +
                                '</option>');
                        });
                    } else {
                        $('#program').empty();
                    }
                }
            });

            $('.pilih-tahun').on('change', function() {
                var tahun = $(this).val();
                if (tahun) {
                    $.ajax({
                        url: '/get_program/',
                        type: 'GET',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'tahun': tahun
                        },
                        dataType: 'json',
                        success: function(data) {
                            if (data) {
                                $('#program').empty();
                                $.each(data, function(index, program) {
                                    var
                                        selected = (program.id == program_id) ?
                                        'selected' : '';
                                    $('#program').append('<option value="' + program
                                        .id + '" ' +
                                        selected + '>' + program.nama_program +
                                        '</option>');
                                });
                            } else {
                                $('#program').empty();
                            }
                        }
                    });
                } else {
                    $('#program').empty();
                }
            });
        });
    </script>
@endpush
