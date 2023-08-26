@extends('adminlte::page')

@section('title', 'Maklumat Kenderaan | Dashboard')

@section('content_header')
    <h1>Maklumat Kenderaan</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="pull-right">
                    <a href="{{ route('users.vehicles.index') }}" class="float-right btn btn-primary btn-xs">
                        <i class="fa fa-undo"></i>Kembali
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable dtr-inline">
                        <tbody>
                            <tr>
                                <th>Nama Pemandu</th>
                                <td>{{ $vehicle->driver->nama_pemandu }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kenderaan</th>
                                <td>{{ $vehicle->vehicle }}</td>
                            </tr>
                            <tr>
                                <th>Model</th>
                                <td>{{ $vehicle->model }}</td>
                            </tr>
                            <tr>
                                <th>No Pendaftaran</th>
                                <td>{{ $vehicle->nodaftar}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $vehicle->status }}</td>
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