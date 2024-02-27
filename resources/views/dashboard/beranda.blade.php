@extends('layout.template')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container-fluid mt-5">
      <div class="row">
          <!-- Konten Beranda -->
          <main class="col-md-9 ms-sm-auto col-lg-10 px-md-2">
              <h2 class="text-center mb-4">Realisasi Program</h2>

              <div class="row">
                  <div class="col-md-3">
                      <div class="card bg-primary text-white mb-3">
                          <div class="card-body">
                              <h5 class="card-title">Triwulan 1</h5>
                              <p class="card-text">Actual: 2000</p>
                              <p class="card-text">Percentage: 40%</p>
                          </div>
                      </div>
                  </div>

                  <div class="col-md-3">
                      <div class="card bg-success text-white mb-3">
                          <div class="card-body">
                              <h5 class="card-title">Triwulan 2</h5>
                              <p class="card-text">Actual: 2500</p>
                              <p class="card-text">Percentage: 50%</p>
                          </div>
                      </div>
                  </div>

                  <div class="col-md-3">
                      <div class="card bg-warning text-dark mb-3">
                          <div class="card-body">
                              <h5 class="card-title">Triwulan 3</h5>
                              <p class="card-text">Actual: 3000</p>
                              <p class="card-text">Percentage: 60%</p>
                          </div>
                      </div>
                  </div>


                  <div class="col-md-3">
                      <div class="card bg-danger text-white mb-3">
                          <div class="card-body">
                              <h5 class="card-title">Triwulan 4</h5>
                              <p class="card-text">Actual: 1800</p>
                              <p class="card-text">Percentage: 36%</p>
                          </div>
                      </div>
                  </div>
              </div>
          </main>
      </div>
  </div>

</div>
@endsection
