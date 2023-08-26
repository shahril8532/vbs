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
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
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
                              @foreach ($bookings as $key => $item)
                              <tr>
                                  <td>{{ ++$i }}</td>
                                  <td><strong><span class="badge badge-info">{{ $item->tempahan_id}}</span></strong></td>
                                  <td>{{ $item->pengguna->nama}}</td>
                                  <td>{{ $item->pengguna->sektor}}</td>
                                  <td>{{ $item->destinasi }}</td>
                                  <td>{{ Carbon\Carbon::parse($item->start_date)->format('D, d-m-Y H:i A')}}</td>
                                  <td>{{ Carbon\Carbon::parse($item->end_date)->format('D, d-m-Y H:i A') }}</td>
                                  <td class="text-center"><img src="{{ asset('/storage/doc_img/'. $item->image)}}" width="30px"><br><a href="{{ asset('/storage/doc_img/'. $item->image)}}" title='Detail' target="_blank" class="btn btn-xs btn-dark"><i class='fas fa-play'></i></a></td>
                                  <td class="text-center">
                                      @if ($item->status == 'LULUS')
                                          <span class="badge badge-success status">{{ $item->status }}</span>
                                      @elseif ($item->status == 'TIDAK BERJAYA')
                                          <span class="badge badge-danger status">{{ $item->status }}</span>
                                      @elseif ($item->status == 'DALAM PROSES')
                                          <span class="badge badge-warning status"">{{ $item->status }}</span>
                                      @endif
                                  </td>
                                  <td class="text-center">
                                      <a href="{{ route('users.bookings.show', $item->id) }}" title='Info' id='btnShow'
                                          class="btn btn-xs btn-success">
                                          <i class='fas fa-eye'></i>
                                      </a>
                                      <a href="{{ route('users.bookings.edit', $item->id) }}" title='Kemaskini' id='btnEdit'
                                          class="btn btn-xs btn-warning">
                                          <i class='fas fa-edit'></i>
                                      </a>
                                      <form action="{{ route('users.bookings.destroy', $item->id) }}" title='Hapus'
                                          id="btnDel" method="post" class="d-inline">
                                          @method('delete')
                                          @csrf
                                          <button class="btn btn-xs btn-outline-danger confirm-button">
                                              <i class='fas fa-trash'></i>
                                          </button>
                                      </form>
                                      <a href="{{ url('users/sent-mail') }}" title ='Emel'
                                        class="btn btn-xs btn-info">
                                        <i class='fas fa-bullhorn'></i>
                                      </a>
                                  </td>
                              </tr>
                          @endforeach
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
                    </div>
                    <!-- /.card-body -->
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
