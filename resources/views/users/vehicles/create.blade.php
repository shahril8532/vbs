@extends('adminlte::page')

@section('title', 'Kenderaan | Dashboard')

@section('content_header')
    <h1>Tambah Kenderaan</h1>
@stop

@section('content')
   <div class="container-fluid">
        <div id="errorBox"></div>
            <form method="POST" action="{{route('users.vehicles.store')}}">
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
                                <option value="KERETA">KERETA</option>
                                <option value="SUV">SUV</option>
                                <option value="VAN">VAN</option>
                                <option value="BAS">BAS</option>
                                <option value="HILUX">HILUX</option>
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
                            <a href="{{ route('users.vehicles.index') }}" class="btn btn-primary">Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </form> 
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop

@section('plugins.Datatables', true)
@section('plugins.Select2', true)

@section('footer')
<strong>Copyright &copy; 2023 <a href="https://jpnmelaka.moe.gov.my/">Sektor Pengurusan Maklumat Jabatan Pendidikan Negeri Melaka</a>.</strong>
    HakCipta Terpelihara.
    <div class="float-right d-none d-sm-inline-block">
    <b>Dibangunkan Oleh</b> Webmaster
    </div>
@stop


