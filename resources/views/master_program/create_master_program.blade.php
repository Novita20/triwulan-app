@extends('layout.template')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Indikator Program</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Indikator Program</a></li>
              <li class="breadcrumb-item active">Indikator Program</li>
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
                {!! (isset($master_program))? method_field('PUT') : '' !!}

                <div class="form-group">
                    <label>Pilih Tahun</label>
                    <select class="form-control @error('tahun') is-invalid @enderror" name="tahun">
                        <option value="" selected disabled>Pilih Tahun</option>
                        @php
                            $currentYear = date('Y');
                            $startYear = 2022; // Tahun awal
                        @endphp
                        @for($tahun = $currentYear; $tahun >= $startYear; $tahun--)
                            <option value="{{ $tahun }}" {{ isset($master_program) && $master_program->tahun == $tahun ? 'selected' : '' }}>{{ $tahun }}</option>
                        @endfor
                    </select>
                    @error('tahun')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>No Rekening</label>
                    <input class="form-control @error('no_rekening') is-invalid @enderror" value="{{ isset($master_program)? $master_program->no_rekening : old('no_rekening') }}" name="no_rekening" type="text" />
                    @error('no_rekening')
                        <span class="error invalid-feedback">{{ $message }} </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Nama Program</label>
                    <input class="form-control @error('nama_program') is-invalid @enderror" value="{{ isset($master_program)? $master_program->nama_program : old('nama_program') }}" name="nama_program" type="text"/>
                    @error('nama_program')
                        <span class="error invalid-feedback">{{ $message }} </span>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit">Simpan</button>



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
  th{

  }
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
