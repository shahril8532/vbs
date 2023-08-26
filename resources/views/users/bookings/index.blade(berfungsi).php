@extends('adminlte::page')

@section('title', 'Tempahan')

@section('content_header')
    <h1>Senarai Tempahan</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <!--<h3 class="card-title"></h3>-->
                        <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl">
                                Tambah
                            </button>-->
                        <a href="{{ route('users.bookings.create') }}" class="btn btn-primary btn-sm"><i
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
                                    <th>Tempahan ID</th>
                                    <th>Nama Pemohon</th>
                                    <th>Sektor/Unit</th>
                                    <th>Destinasi</th>
                                    <th>Tarikh & Masa Bertolak</th>
                                    <th>Tarikh & Masa Pulang</th>
                                    <th>Dokumen</th>
                                    <th>Status</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($bookings) > 0)
                                    @foreach ($bookings as $key => $item)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td><strong><span class="badge badge-info">{{ $item->tempahan_id}}</span></strong></td>
                                            <td>{{ $item->pengguna->nama}}</td>
                                            <td>{{ $item->pengguna->sektor}}</td>
                                            <td>{{ $item->destinasi }}</td>
                                            <td>{{ Carbon\Carbon::parse($item->start_date)->format('D, d-m-Y H:i A')}}</td>
                                            <td>{{ Carbon\Carbon::parse($item->end_date)->format('D, d-m-Y H:i A') }}</td>
                                            <td><img src="{{ asset('/storage/doc_img/'. $item->image)}}" width="60px"></td>
                                            <td>
                                                @if ($item->status == 'LULUS')
                                                    <span class="badge badge-success status">{{ $item->status }}</span>
                                                @elseif ($item->status == 'TIDAK LULUS')
                                                    <span class="badge badge-danger status">{{ $item->status }}</span>
                                                @elseif ($item->status == 'DALAM PROSES')
                                                    <span class="badge badge-warning status"">{{ $item->status }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('users.bookings.show', $item->id) }}" id='btnShow'
                                                    class="btn btn-xs btn-success">
                                                    <i class='fas fa-eye'></i>
                                                </a>
                                                <a href="{{ route('users.bookings.edit', $item->id) }}" id='btnEdit'
                                                    class="btn btn-xs btn-warning">
                                                    <i class='fas fa-edit'></i>
                                                </a>
                                                <form action="{{ route('users.bookings.destroy', $item->id) }}"
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
                                        <td colspan="15"class="text-center">Tiada Data Tempahan Ditemui</td>
                                    </tr>
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Bil</th>
                                    <th>Tempahan ID</th>
                                    <th>Nama Pemohon</th>
                                    <th>Sektor/Unit</th>
                                    <th>Destinasi</th>
                                    <th>Tarikh & Masa Bertolak</th>
                                    <th>Tarikh & Masa Pulang</th>
                                    <th>Dokumen</th>
                                    <th>Status</th>
                                    <th>Tindakan</th>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="pull-right">
                            {{ $bookings->withQueryString()->links('pagination::bootstrap-5') }}
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
