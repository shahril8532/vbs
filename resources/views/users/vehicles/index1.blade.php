@extends('adminlte::page')

@section('title', 'Kenderaan | Dashboard')

@section('content_header')
    <h1>Kenderaan</h1>
@stop

@section('content')
<div class="container-fluid">
    <div id="errorBox"></div>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h5>Senarai Kenderaan</h5>
            </div>
            <a class="float-right btn btn-primary btn-xs m-0" href="{{route('users.vehicles.create')}}"><i class="fas fa-plus"></i>Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div id="example1_filter" class="dataTables_filter">
                            <label>Search:
                                <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1">
                            </label>
                        </div>
                    </div>

                

                    
                </div>     
            </div>
            <table class="table table-bordered table-striped dataTable dtr-inline">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemandu</th>
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
                                <th>Nama Pemandu</th>
                                <th>Jenis Kenderaan</th>
                                <th>Model</th>
                                <th>No Pendaftaran</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                </table>
                <div class="pull-right">
                    {{ $vehicles->links('pagination::bootstrap-5') }}
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

@section('plugins.Datatables', true)
@section('plugins.Select2', true)

@section('footer')
<strong>Copyright &copy; 2023 <a href="https://jpnmelaka.moe.gov.my/">Unit ICT Jabatan Pendidikan Negeri Melaka</a>.</strong>
    HakCipta Terpelihara.
    <div class="float-right d-none d-sm-inline-block">
    <b>Dibangunkan Oleh</b> Webmaster
    </div>
@stop


