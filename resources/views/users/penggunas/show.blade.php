@extends('adminlte::page')

@section('title', 'Maklumat Pengguna | Dashboard')

@section('content_header')
    <h1>Maklumat Penggguna</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="pull-right">
                    <a href="{{ route('users.penggunas.index') }}" class="float-right btn btn-primary btn-xs">
                        <i class="fa fa-undo"></i>Kembali
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable dtr-inline">
                        <tbody>
                            <tr>
                                <th>No Kad Pengenalan</th>
                                <td>{{ $pengguna->nokadpengenalan }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{$pengguna->nama }}</td>
                            </tr>
                            <tr>
                                <th>Jawatan</th>
                                <td>{{ $pengguna->jawatan }}</td>
                            </tr>
                            <tr>
                                <th>Sektor / Unit</th>
                                <td>{{ $pengguna->sektor }}</td>
                            </tr>
                            <tr>
                                <th>No Telefon </th>
                                <td>{{$pengguna->notelefon}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $pengguna->status }}</td>
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