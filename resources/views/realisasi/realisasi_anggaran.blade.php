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
                                <th rowspan="2">Aksi</th>


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
                                        <td>{{ $realisasi->indkinerja->satuan }}</td>
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
    {{-- <script>
  alert('Halaman Home')
</script> --}}

    <script>
        function confirmDelete() {
            if (confirm('Apakah Anda yakin? Data akan dihapus. Apakah Anda ingin melanjutkan?')) {
                document.getElementById('form').submit();
            } else {
                event.preventDefault();
            }
        }
    </script>
@endpush
