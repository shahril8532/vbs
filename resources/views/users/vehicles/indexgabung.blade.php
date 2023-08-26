@extends('adminlte::page')

@section('title', 'Kenderaan | Dashboard')

@section('content_header')
    <h1>Tambah Kenderaan</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div id="errorBox"></div>
        <div class="col-3">
            <form method="POST" action="{{route('users.drivers.store')}}">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h5>Tambah Baru</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Nama Pemandu<span class="text-danger">*</span></label>
                            <select name="driver_id" class="form-control @error('driver_id') is-invalid @enderror">
                                <option selected disabled>- Sila Pilih -</option>
                                @foreach ($drivers as $driver)
                                    <option value="{{ $driver->id }}" {{ old('driver_id') == $driver->id ? 'selected' : null }}>{{($driver->nama_pemandu) }}</option>
                                    <!--<option value="{{$driver->id}}">{{ucfirst($driver->nama_pemandu)}}</option>-->
                                @endforeach
                            </select>
                            @if($errors->has('driver_id'))
                            <span class="text-danger">{{$errors->first('driver_id')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jenis Kenderaan<span class="text-danger">*</span></label>
                            <select name="vehicle" class="form-control @error('vehicle') is-invalid @enderror">
                                <option selected disabled>- Sila Pilih -</option>
                                <option value="Kereta">Kereta</option>
                                <option value="Pajero">Pajero</option>
                                <option value="Trooper">Trooper</option>
                                <option value="Bas">Bas</option>
                                <option value="Van">Van</option>
                                <option value="NISSAN XTRAIL">NISSAN XTRAIL</option>
                                <option value="Coaster">Coaster</option>
                            </select>
                            @if($errors->has('vehicle'))
                            <span class="text-danger">{{$errors->first('vehicle')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-label">Model <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="model" placeholder="Model" value="{{old('model')}}">
                            @if($errors->has('model'))
                            <span class="text-danger">{{$errors->first('model')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="nodaftar" class="form-label">No Pendaftaran <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nodaftar" placeholder="No Pendaftaran" value="{{old('nodaftar')}}">
                            @if($errors->has('nodaftar'))
                            <span class="text-danger">{{$errors->first('nodaftar')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status<span class="text-danger">*</span></label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror">
                                <option selected disabled>- Sila Pilih -</option>
                                <option value="Boleh Digunakan">Boleh Digunakan</option>
                                <option value="Rosak">Rosak</option>
                                <option value="Selenggara">Selenggara</option>
                            </select>
                            @if($errors->has('status'))
                            <span class="text-danger">{{$errors->first('status')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h5>Senarai Kenderaan</h5>
                    </div>
                </div>
                <div class="card-body">    
                    <!--DataTable-->
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dt-buttons btn-group flex-wrap">               
                                    <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="example1" type="button">
                                        <span>Salin</span>
                                    </button> 
                                    <button class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1" type="button">
                                        <span>CSV</span>
                                    </button> 
                                    <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1" type="button">
                                        <span>Excel</span>
                                    </button> 
                                    <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button">
                                        <span>PDF</span>
                                    </button> 
                                    <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1" type="button">
                                        <span>Cetak</span>
                                    </button> 	
                                </div>
                            </div>
                        </div>
                    <table class="table table-bordered table-striped dataTable dtr-inline">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Kenderaan</th>
                                    <th>Model</th>
                                    <th>No Pendaftaran</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $vehicles as $key => $item )
                                    <tr>
                                        <td>{{ $vehicles->firstItem() + $key }}</td>
                                        <td>{{ $item->driver->nama_pemandu }}</td>
                                        <td>{{ $item->vehicle }}</td>
                                        <td>{{ $item->model }}</td>
                                        <td>{{ $item->nodaftar }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('users.vehicles.show', $item->id)}}" id='btnShow' class="btn btn-xs btn-success">
                                                <i class='fas fa-eye'></i>
                                            </a>
                                            <a href="{{ route('users.vehicles.edit', $item->id)}}" id='btnEdit' class="btn btn-xs btn-warning">
                                                <i class='fas fa-edit'></i>
                                            </a>
                                            <form action="{{ route('users.vehicles.destroy', $item->id)}}" id="btnDel" method="post" class="d-inline" onsubmit="return confirm('Adakah Anda Yakin Hapus Data?')">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-xs btn-outline-danger">
                                                    <i class='fas fa-trash'></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Kenderaan</th>
                                    <th>Model</th>
                                    <th>No Pendaftaran</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop

@section('footer')
<strong>Copyright &copy; 2023 <a href="https://jpnmelaka.moe.gov.my/">Unit ICT Jabatan Pendidikan Negeri Melaka</a>.</strong>
    HakCipta Terpelihara.
    <div class="float-right d-none d-sm-inline-block">
    <b>Dibangunkan Oleh</b> Webmaster
    </div>
@stop

