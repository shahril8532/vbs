@extends('adminlte::page')

@section('title', 'Kemaskini Pemandu | Dashboard')

@section('content_header')
    <h1>Kemaskini Pemandu</h1>
@stop

@section('content')
   <div class="container-fluid">
    <div class="row">
        <div id="errorBox"></div>
        <div class="col-3">
            <form method="POST" action="{{route('users.drivers.update', $driver->id)}}">
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
                            <label for="nokadpengenalan" class="form-label">No Kad Pengenalan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nokadpengenalan" placeholder="No Kad Pengenalan" value="{{$driver->nokadpengenalan}}">
                            @if($errors->has('nokadpengenalan'))
                                <span class="text-danger">{{$errors->first('nokadpengenalan')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="nama_pemandu" class="form-label">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nama_pemandu" placeholder="Nama" value="{{$driver->nama_pemandu}}">
                            @if($errors->has('nama_pemandu'))
                                <span class="text-danger">{{$errors->first('nama_pemandu')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="notelefon" class="form-label">No Telefon <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="notelefon" placeholder="No Telefon" value="{{$driver->notelefon}}">
                            @if($errors->has('notelefon'))
                                <span class="text-danger">{{$errors->first('notelefon')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                            <select class="form-control select2"  id="select2" data-placeholder="Sila Pilih" name="status">
                            <option value="{{$driver->status }}">{{$driver->status }}</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                            <option value="Cuti Sakit">Cuti Sakit</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('users.drivers.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Kemaskini</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
   </div>
@stop