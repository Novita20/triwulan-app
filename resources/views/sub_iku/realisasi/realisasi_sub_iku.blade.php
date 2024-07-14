@extends('layout.template')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Realisasi Sub Iku</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('sub_iku.realisasi')}}">Realisasi Sub Iku</a></li>
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
                            <form action="{{ route("sub_iku.realisasi") }}" method="GET">
                                <input type="text" id="realisasi" name="realisasi" class="form-control"
                                       placeholder="Cari...">
                            </form>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('sub_iku.realisasi.download') }}" class="btn btn-success">Download Excel</a>
                        </div>
                    </div>
                    <br>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th colspan="22" style="text-align: center;">Realisasi</th>
                        </tr>
                        <tr>
                            <th rowspan="3" style="text-align: center;">MISI RPJMD</th>
                            <th rowspan="3" style="text-align: center;">TUJUAN RPJMD</th>
                            <th rowspan="3" style="text-align: center;">SASARAN RPJMD</th>
                            <th rowspan="3" style="text-align: center;">INDIKATOR TUJUAN / SASARAN DP</th>
                            @foreach (range($first_year, $first_year + 4) as $year)
                                <th colspan="2">{{ $year }}</th>
                            @endforeach
                            <th rowspan="3">Keterangan</th>
                            <th rowspan="3">Edit Tahunan</th>
                        </tr>
                        <tr>
                            @php
                                for ($i=0; $i < 5; $i++):
                            @endphp
                            <th colspan="2">Kinerja</th>
                            @php
                                endfor;
                            @endphp
                        </tr>
                        <tr>
                            @php
                                for ($i=0; $i < 5; $i++):
                            @endphp
                            <th>Angka</th>
                            <th>%</th>
                            @php
                                endfor;
                            @endphp
                        </tr>

                        </thead>
                        <tbody>
                        @foreach($data as $i => $item)
                            <tr>
                                 <td>{{ $item->misi_rpjmd }}</td>
                                 <td>{{ $item->tujuan_rpjmd }}</td>
                                 <td>{{ $item->sasaran_rpjmd }}</td>
                                 <td>{{ $item->subIkuSasaran->first()->indikator_tujuan }}</td>
                                @foreach (range($first_year, $first_year + 4) as $year)
                                    @php
                                        $found = [];
                                        $found[$year] = false;
                                    @endphp
                                    @foreach($item->subIkuKinerja as $item_kinerja)
                                        @if($item_kinerja->tahun == $year && !$found[$year])
                                            <td>{{ $item_kinerja->realisasiSubIku->kinerja ?? 0 }}</td>
                                            <td>
                                                @php($kj = $item_kinerja->realisasiSubIku->kinerja ?? 0)
                                                {{ $kj === 0 ? 0 : ($kj / $item_kinerja->angka_kinerja) * 100 }}
                                            </td>
                                            @php($found[$year] = true)
                                        @endif
                                    @endforeach
                                    @if($found[$year] === false)
                                        <td>0</td>
                                        <td>0%</td>
                                    @endif
                                @endforeach
                                <td>
                                    <button data-toggle="modal" data-target="#keteranganModal" ket-id="{{ $item->id }}"
                                            class="btn btn-sm btn-warning ket-btn">Lihat</button>
                                </td>
                                <td>
                                    @if ($item->subIkuKinerja->count() == 0)
                                        <p>Harap Isi Tahun</p>
                                    @else
                                        <button realisasi-id="{{ $item->id }}"
                                                data-toggle="modal" data-target="#editModal"
                                        class="btn btn-sm btn-success edit-button">Edit</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

{{--  Modal Edit --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route("sub_iku.realisasi.update") }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="sub_iku_id" id="sub_iku_id">
                        <div class="form-group">
                            <label for="sub_iku_kinerja_id">Tahun Kinerja</label>
                            <select class="form-control @error('sub_iku_kinerja_id') is-invalid @enderror" name="sub_iku_kinerja_id"
                                    id="sub_iku_kinerja_id">
                                <option>Pilih Tahun Kinerja</option>
                            </select>
                            @error('sub_iku_kinerja_id')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kinerja">Kinerja</label>
                            <input class="form-control @error('kinerja') is-invalid @enderror" name="kinerja" type="text"
                                   id="kinerja" />
                            @error('kinerja')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
{{--  end Modal Edit --}}

    {{--  Modal Keterangan --}}
    <div class="modal fade" id="keteranganModal" tabindex="-1" aria-labelledby="keteranganModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="keteranganModalLabel">Keterangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row form-container"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{--  end Modal Keterangan --}}
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
        $(document).ready(function () {
            $('.edit-button').click(function () {
                let realisasiId = $(this).attr('realisasi-id');
                $.ajax({
                    url: '/sub_iku/realisasi/' + realisasiId + '/edit',
                    method: 'GET',
                    success: function (data) {
                        console.log(data);
                        $('#editModal #editModalLabel').text('Edit Realisasi ' + data.misi_rpjmd);
                        $('#editModal #sub_iku_id').val(data.id);
                        const subIkuKinerja = $('#editModal #sub_iku_kinerja_id');
                        subIkuKinerja.empty();
                        subIkuKinerja.append('<option>Pilih Tahun Kinerja</option>');
                        data.sub_iku_kinerja.forEach(function (item) {
                            subIkuKinerja.append('<option value="' + item.id + '">' + item.tahun + '</option>');
                        });
                    }
                });
                $('#editModal #sub_iku_kinerja_id').change(function (val) {
                    $.ajax({
                        url: '/sub_iku/realisasi/' + val.target.value + "/kinerja",
                        method: 'GET',
                        success: function (data) {
                            console.log(data);
                            $('#editModal #kinerja').val(data.realisasi_sub_iku?.kinerja??0);
                        }
                    });
                });
            });

            $(".ket-btn").click(function () {
                let ketId = $(this).attr('ket-id');
                $.ajax({
                    url: '/sub_iku/realisasi/' + ketId + '/edit',
                    method: 'GET',
                    success: function (data) {
                        console.log(data);
                        let formContainer = $('.form-container');
                        formContainer.empty();
                        data.sub_iku_kinerja.forEach(function (item) {
                            var kinerja = item.realisasi_sub_iku == null ? 0 : item.realisasi_sub_iku.kinerja;
                            var form = $('<div class="col-6">')
                            form.append('<form>');
                            form.append('<h5 class="text-center"><b>Tahun ' + item.tahun + '</b></h5>');
                            form.append(
                                '<div class="form-group"><label>Kinerja</label><input class="form-control" name="kinerja" type="text" value="' +
                                 kinerja+ '" disabled/></div>');
                            form.append('</form>');
                            formContainer.append(form);
                        });
                    }
                });
            })
        });
    </script>
@endpush
