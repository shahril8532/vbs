@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>{{ \App\Models\User::count() }}</h3>
    
                    <p>Pentadbir Sistem</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-fw fa-users"></i>
                  </div>
                  <a href="{{ route('users.index') }}" class="small-box-footer">Maklumat Lanjut  <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>{{ \App\Models\Pengguna::count() }}</h3>
    
                    <p>Pengguna</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-fw fa-users"></i>
                  </div>
                  <a href="{{ route('users.penggunas.index') }}" class="small-box-footer">Maklumat Lanjut <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>{{ \App\Models\Driver::count() }}</h3>
    
                    <p>Pemandu</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-fw fa-user"></i>
                  </div>
                  <a href="{{ route('users.drivers.index') }}" class="small-box-footer">Maklumat Lanjut  <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>{{ \App\Models\Vehicle::count() }}</h3>
    
                    <p>Kenderaan</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-fw fa-bus"></i>
                  </div>
                  <a href="{{ route('users.vehicles.index') }}" class="small-box-footer">Maklumat Lanjut  <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>{{ \App\Models\Booking::count() }}</h3>
    
                    <p>Tempahan</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-fw fa-book"></i>
                  </div>
                  <a href="{{ route('users.bookings.index') }}" class="small-box-footer">Maklumat Lanjut  <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
            </div>
            <!-- /.row -->
        </div>
      
    </div>
    
  </div>  
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

@section('footer')
<strong>Copyright &copy; 2023 <a href="https://jpnmelaka.moe.gov.my/">Sektor Pengurusan Maklumat Jabatan Pendidikan Negeri Melaka</a>.</strong>
    HakCipta Terpelihara.
    <div class="float-right d-none d-sm-inline-block">
    <b>Dibangunkan Oleh</b> Webmaster
    </div>
@stop