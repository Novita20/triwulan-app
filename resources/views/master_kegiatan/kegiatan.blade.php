@extends('layout.template')
@push('custom_css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Master Kegiatan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Master Kegiatan</a></li>
                            <li class="breadcrumb-item active">Master Kegiatan</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        {{-- <div class="card-body">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <form action="/master_kegiatan" method="GET">
                        <input type="master_kegiatan" id="master_kegiatan" name="master_kegiatan" class="form-control" placeholder="Cari...">
                    </form>
                </div>

                <a href="{{ url('master_kegiatan/create') }}" class="btn btn-sm btn-success my-2">Tambah Kegiatan Baru</a>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Rekening Program</th>
                            <th>Nama Program</th>
                            <th>Rekening Kegiatan</th>
                            <th>Nama Kegiatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($master_kegiatan->count() > 0)
                            @foreach ($master_kegiatan as $i => $t)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $t->rekening_program }}</td>
                                    <td>{{ $t->nama_program }}</td>
                                    <td>{{ $t->rekening_kegiatan }}</td>
                                    <td>{{ $t->nama_kegiatan }}</td>

                                    <td>
                                        <!-- Bikin tombol edit dan delete -->
                                        <a href="{{ url('/master_kegiatan/' . $t->id . '/edit') }}"
                                            class="btn btn-sm btn-warning">edit</a>

                                        <form method="POST" action="{{ url('/master_kegiatan/' . $t->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="confirmDelete()">hapus</button>
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
        </div> --}}

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

                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <form action="/master_kegiatan" method="GET">
                                <input type="master_kegiatan" id="master_kegiatan" name="master_kegiatan" class="form-control"
                                    placeholder="Cari...">
                            </form>
                        </div>
                    </div>


                    <a href="{{ url('master_kegiatan/create') }}" class="btn btn-sm btn-success my-2">Tambah Data</a>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Rekening Program</th>
                                <th>Nama Program</th>
                                <th>Rekening Kegiatan</th>
                                <th>Nama Kegiatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($master_kegiatan->count() > 0)
                                @foreach ($master_kegiatan as $i => $t)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $t->rekening_program }}</td>
                                        <td>{{ $t->nama_program }}</td>
                                        <td>{{ $t->rekening_kegiatan }}</td>
                                        <td>{{ $t->nama_kegiatan }}</td>
    
                                        <td>
                                            <!-- Bikin tombol edit dan delete -->
                                            <a href="{{ url('/master_kegiatan/' . $t->id . '/edit') }}"
                                                class="btn btn-sm btn-warning">edit</a>
    
                                            <form method="POST" action="{{ url('/master_kegiatan/' . $t->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="confirmDelete()">hapus</button>
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

                <div class="row">
                    <div class="col-md-12">
                        {{ $master_kegiatan->links() }}
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Terima Kasih
                </div>
                <!-- /.card-footer-->
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

{{-- @push('custom_js')
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush --}}
