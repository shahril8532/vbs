@extends('adminlte::page')

@section('title', 'Edit Kenderaan | Dashboard')

@section('content_header')
    <h1>Edit Kenderaan</h1>
@stop

@section('content')
   <div class="container-fluid">
        <div id="errorBox"></div>
            <form method="POST" action="{{route('users.vehicles.update', $vehicle->id)}}">
                @method('patch')
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h5>Kemaskini</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Nama Pemandu<span class="text-danger">*</span></label>
                            <select name="driver_id" class="form-control @error('driver_id') is-invalid @enderror">
                                <option selected disabled>- Sila Pilih -</option>
                                @foreach ($drivers as $driver)
                                    <option value="{{ $driver->id }}" {{ old('driver_id',$vehicle->driver_id) == $driver->id ? 'selected' : null }}>{{($driver->nama_pemandu) }}</option>
                                    <!--<option value="{{$driver->id}}">{{ucfirst($driver->nama_pemandu)}}</option>-->
                                @endforeach
                            </select>
                            @error('driver_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jenis Kenderaan<span class="text-danger">*</span></label>
                            <select name="vehicle" class="form-control @error('vehicle') is-invalid @enderror">
                                <option value="{{$vehicle->vehicle }}">{{$vehicle->vehicle }}</option>
                                <option selected disabled>- Sila Pilih -</option>
                                <option value="KERETA">KERETA</option>
                                <option value="SUV">SUV</option>
                                <option value="VAN">VAN</option>
                                <option value="BAS">BAS</option>
                                <option value="HILUX">HILUX</option>
                            </select>
                            @error('vehicle')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Model <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="model" placeholder="Model" value="{{old('model',$vehicle->model)}}">
                            @error('model')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nodaftar" class="form-label">No Pendaftaran <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nodaftar" placeholder="No Pendaftaran" value="{{old('nodaftar',$vehicle->nodaftar)}}">
                            @error('nodaftar')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status<span class="text-danger">*</span></label>
                            <select class="form-control" data-placeholder="Sila Pilih" name="status">
                                <option value="{{$vehicle->status }}">{{$vehicle->status }}</option>
                                <option value="Rosak">Rosak</option>
                                <option value="Boleh Digunakan">Boleh Digunakan</option>
                                <option value="Selenggara">Selenggara</option>
                                @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Kemaskini</button>
                        <a href="{{ route('users.vehicles.index') }}" class="btn btn-primary">Kembali
                        </a>
                    </div>
                </div>
            </form>
   </div>
@stop