@extends('layout.template')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data SubKegiatan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Data Subkegiatan</a></li>
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

                    {{-- <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <form action="/sub_kegiatan/" method="GET">
                                <input type="master_subkegiatan" id="master_subkegiatan" name="master_subkegiatan" class="form-control"
                                    placeholder="Cari...">
                            </form>
                        </div>
                    </div> --}}

                    
                    <a href="{{ url('sub_kegiatan/create') }}" class="btn btn-sm btn-success my-2">Tambah Data</a>

                    <table id ="table-data" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Rekening Program</th>
                                <th>Nama Program</th>
                                <th>Rekening Kegiatan</th>
                                <th>Nama Kegiatan</th>
                                <th>Rekening Subkegiatan</th>
                                <th>Nama Subkegiatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($master_subkegiatan->count() > 0)
                                @foreach ($master_subkegiatan as $i => $t)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $t->kegiatan->program->no_rekening }}</td>
                                        <td>{{ $t->kegiatan->program->nama_program }}</td>
                                        <td>{{ $t->kegiatan->no_rekening }}</td>
                                        <td>{{ $t->kegiatan->nama_kegiatan }}</td>
                                        <td>{{ $t->no_rekening }}</td>
                                        <td>{{ $t->nama_subkegiatan }}</td>
                                        <td>
                                            <!-- Bikin tombol edit dan delete -->
                                            <a href="{{ url('/sub_kegiatan/' . $t->id . '/edit') }}"
                                                class="btn btn-sm btn-warning"><i class="fas fa-pen" style="color: white"></i></a>

                                            <form method="POST" action="{{ url('/sub_kegiatan/' . $t->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="confirmDelete()"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">Data tidak ada</td>
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
    <script>
        function confirmDelete() {
            if (confirm('Apakah Anda yakin? Data akan dihapus. Apakah Anda ingin melanjutkan?')) {
                document.getElementById('form').submit();
            }else {
                event.preventDefault();
            }
        }
    </script>
@endpush
