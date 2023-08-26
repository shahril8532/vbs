@extends('adminlte::page')

@section('title', 'Laporan Tempahan')

@section('content_header')
    <h1>Laporan Tempahan</h1>
@stop

@section('content')

<div class="container-fluid">
    <h2 class="text-center display-4"></h2>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form method="GET" action="{{route('users.reports.filter')}}">
                <div class="col-md-6 offset-md-3 " class="form-group">
                    <i class="far fa-calendar-alt"> </i>
                    <label>Tarikh Bermula<span
                            class="text-danger">*</span></label>
                    <input type="date" name="start_date" class="form-control" required>
                    @if ($errors->has('start_date'))
                    <span
                        class="text-danger">{{ $errors->first('start_date') }}</span>
                @endif
                </div>   
                <div class="col-md-6 offset-md-3" class="form-group">
                    <i class="far fa-calendar-alt"> </i>
                    <label>Tarikh Akhir<span
                            class="text-danger">*</span></label>
                    <input type="date" name="end_date" class="form-control" required>
                    @if ($errors->has('end_date'))
                    <span
                        class="text-danger">{{ $errors->first('end_date') }}</span>
                    @endif
                    <br>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div><br>
            </form>
        </div>
    </div>
</div><br>
<div class="card-body table-responsive p-0">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama Pemohon</th>
                <th>Sektor / Unit</th>
                <th>Nama Penumpang</th>
                <th>Jenis Kenderaan</th>
                <th>No Pendaftaran Kenderaan</th>
                <th>Destinasi</th>
                <th>Nama Pemandu Pergi</th>
                <th>Nama Pemandu Pulang</th>
                <th>Tarikh & Masa Bertolak</th>
                <th>Tarikh & Masa Pulang</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
           
                @foreach ($bookings as $key => $item)
                    <tr>
                        <td>{{ $item->pengguna->nama }}</td>
                        <td>{{ $item->pengguna->sektor }}</td>
                        <td>{{ $item->namapenumpang }}</td>
                        <td>{{ $item->vehicle->vehicle }}</td>
                        <td>{{ $item->vehicle->nodaftar }}</td>
                        <td>{{ $item->destinasi }}</td>
                        <td>{{ $item->driver->nama_pemandu}}</td>
                        <td>{{ $item->namapemandu2}}</td>
                        <td>{{ Carbon\Carbon::parse($item->start_date)->format('D, d-m-Y H:i A')}}</td>
                        <td>{{ Carbon\Carbon::parse($item->end_date)->format('D, d-m-Y H:i A') }}</td>
                        <td>
                            @if ($item->status == 'LULUS')
                                <span class="badge badge-success status">{{ $item->status }}</span>
                            @elseif ($item->status == 'TIDAK BERJAYA')
                                <span class="badge badge-danger status">{{ $item->status }}</span>
                            @elseif ($item->status == 'DALAM PROSES')
                                <span class="badge badge-warning status"">{{ $item->status }}</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
        </tbody>
    </table>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "searching": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["excel","print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    });
</script>

@stop

@section('footer')
    <strong>Copyright &copy; 2023 <a href="https://jpnmelaka.moe.gov.my/">Sektor Pengurusan Maklumat Jabatan Pendidikan Negeri
            Melaka</a>.</strong>
    HakCipta Terpelihara.
    <div class="float-right d-none d-sm-inline-block">
        <b>Dibangunkan Oleh</b> Webmaster
    </div>
@stop