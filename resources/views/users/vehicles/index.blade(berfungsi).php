@extends('adminlte::page')

@section('title', 'Kenderaan | Dashboard')

@section('content_header')
    <h1>Senarai Kenderaan</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <!--<h3 class="card-title"></h3>-->
                        <a href="{{ route('users.vehicles.create') }}" class="btn btn-primary btn-sm"><i
                                class="fas fa-plus"></i>Tambah</a>

                        <div class="card-tools">
                            <form action="" method="get">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="keyword" class="form-control float-right"
                                        placeholder="Carian">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Bil</th>
                                    <th>Nama Pemandu</th>
                                    <th>Jenis Kenderaan</th>
                                    <th>Model</th>
                                    <th>No Pendaftaran</th>
                                    <th>Status</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($vehicles) > 0)
                                    @foreach ($vehicles as $key => $item)
                                        <tr>
                                            <td>{{ $vehicles->firstItem() + $key }}</td>
                                            <td>{{ $item->driver->nama_pemandu ?? ''}}</td>
                                            <td>{{ $item->vehicle }}</td>
                                            <td>{{ $item->model }}</td>
                                            <td>{{ $item->nodaftar }}</td>
                                            <td>
                                                @if ($item->status == 'Boleh Digunakan')
                                                    <span class="badge badge-success status">{{ $item->status }}</span>
                                                @elseif ($item->status == 'Rosak')
                                                    <span class="badge badge-danger status">{{ $item->status }}</span>
                                                @elseif ($item->status == 'Selenggara')
                                                    <span class="badge badge-warning status"">{{ $item->status }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('users.vehicles.show', $item->id) }}" id='btnShow'
                                                    class="btn btn-xs btn-success">
                                                    <i class='fas fa-eye'></i>
                                                </a>
                                                <a href="{{ route('users.vehicles.edit', $item->id) }}" id='btnEdit'
                                                    class="btn btn-xs btn-warning">
                                                    <i class='fas fa-edit'></i>
                                                </a>
                                                <form action="{{ route('users.vehicles.destroy', $item->id) }}"
                                                    id="btnDel" method="post" class="d-inline"
                                                    onsubmit="return confirm('Adakah Anda Yakin Hapus Data?')">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-xs btn-outline-danger">
                                                        <i class='fas fa-trash'></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="15"class="text-center">Tiada Data Kenderaan Ditemui</td>
                                    </tr>
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Bil</th>
                                    <th>Nama Pemandu</th>
                                    <th>Jenis Kenderaan</th>
                                    <th>Model</th>
                                    <th>No Pendaftaran</th>
                                    <th>Status</th>
                                    <th>Tindakan</th>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="pull-right">
                            {{ $vehicles->withQueryString()->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
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
    <strong>Copyright &copy; 2023 <a href="https://jpnmelaka.moe.gov.my/">Unit ICT Jabatan Pendidikan Negeri
            Melaka</a>.</strong>
    HakCipta Terpelihara.
    <div class="float-right d-none d-sm-inline-block">
        <b>Dibangunkan Oleh</b> Webmaster
    </div>
@stop
