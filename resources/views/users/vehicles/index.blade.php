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
                </div>
                <div class="card-body table-responsive p-0">
                    <table id="example1" class="table table-bordered table-striped">
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
                                @foreach ($vehicles as $key => $item)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $item->driver->nama_pemandu ?? ''}}</td>
                                        <td>{{ $item->vehicle }}</td>
                                        <td><strong><span class="badge badge-info">{{ $item->model}}</span></strong></td>
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
                                            <a href="{{ route('users.vehicles.show', $item->id) }}" title='Info' id='btnShow'
                                                class="btn btn-xs btn-success">
                                                <i class='fas fa-eye'></i>
                                            </a>
                                            <a href="{{ route('users.vehicles.edit', $item->id) }}" title='Kemaskini' id='btnEdit'
                                                class="btn btn-xs btn-warning">
                                                <i class='fas fa-edit'></i>
                                            </a>
                                            <form action="{{ route('users.vehicles.destroy', $item->id) }}" title='Hapus'
                                                id="btnDel" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-xs btn-outline-danger confirm-button">
                                                    <i class='fas fa-trash'></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
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
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
     <!-- DataTables -->
     <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
     <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
     <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@stop

@section('js')
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
                "lengthChange": true,
                "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"]
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.confirm-button').click(function(event) {
            var form = $(this).closest("form");
            event.preventDefault();
            swal({
                    title: `Adakah Anda Pasti Menghapuskan Data Pada Baris Ini?`,
                    text: "Data Tidak Akan DiTemui Semula",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
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