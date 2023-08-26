@extends('adminlte::page')

@section('title', 'Maklumat Pemandu | Dashboard')

@section('content_header')
    <h1>Maklumat Pemandu</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="pull-right">
                    <a href="{{ route('users.drivers.index') }}" class="float-right btn btn-primary btn-xs">
                        <i class="fa fa-undo"></i>Kembali
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable dtr-inline">
                        <tbody>
                            <tr>
                                <th>No Kad Pengenalan</th>
                                <td>{{ $driver->nokadpengenalan }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $driver->nama_pemandu }}</td>
                            </tr>
                            <tr>
                                <th>No Telefon</th>
                                <td>{{ $driver->notelefon }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $driver->status }}</td>
                            </tr>
                        </tbody>
                    </table>
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

@section('plugins.Datatables', true)