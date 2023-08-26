@extends('adminlte::page')

@section('title', 'Paparan Tempahan')

@section('content_header')
    <h1>Paparan Tempahan</h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <small class="float-right">Tarikh Cetakan :{{ date('d/m/Y') }}<br></small>
                                    <b>Tempahan ID :</b> <strong>{{ $booking->tempahan_id }}</strong><br>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <address>
                                    <strong></strong><br>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <strong>JABATAN PENDIDIKAN NEGERI MELAKA</strong>
                                <address>
                                    JALAN ISTANA, BUKIT BERUANG,<br>
                                    75450 MELAKA.<br>
                                    Telefon: 606-232 3776 / 3777 / 3778 / 3779<br>
                                    Faks: 606-232 0500<br>
                                    E-mel : jpnmelaka@moe.gov.my<br>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-book"></i>Maklumat Permohonan
                                    <small class="float-right"></small>
                                </h4>
                            </div>
                            <div class="col-6">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                    <thead>
                                        <tbody>
                                            <tr>
                                                <th style="width:50%">Status Permohonan:</th>
                                                <td><strong>{{ $booking->status }}</strong></td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">Nama Pemohon:</th>
                                                <td>{{ $booking->pengguna->nama }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jawatan:</th>
                                                <td>{{ $booking->pengguna->jawatan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Maklumat Pengguna:</th>
                                                <td>{{ $booking->namapengguna }}</td>
                                            </tr>
                                            <tr>
                                                <th>Bilangan Penumpang</th>
                                                <td>{{ $booking->bilangan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Penumpang:</th>
                                                <td>{{ $booking->namapenumpang }}</td>
                                            </tr>
                                        </tbody>
                                    </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <th style="width:50%">Tarikh Permohonan:</th>
                                                <td>{{ Carbon\Carbon::parse($booking->created_at)->format('D, d-m-Y H:i A')}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">Nombor Telefon:</th>
                                                <td>{{ $booking->pengguna->notelefon }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">Sektor / Unit:</th>
                                                <td>{{ $booking->pengguna->sektor }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jenis Tugas Rasmi</th>
                                                <td>{{ $booking->jenis }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jarak Sehala (KM)</th>
                                                <td>{{ $booking->jarak }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tujuan</th>
                                                <td>{{ $booking->tujuan }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-12"><br>
                                <h4>
                                    <i class="fas fa-book"></i>Jadual Pergerakan Tugas Rasmi / Sektor Perjalanan
                                    <small class="float-right"></small>
                                </h4>
                            </div>
                            <div class="col-6">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <th style="width:50%">Keperluan Pemandu Bermalam :</th>
                                                <td>{{ $booking->keperluan }}</></td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">Catatan:</th>
                                                <td>{{ $booking->catatan }}</></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <th style="width:50%">Penginapan Pemandu Disediakan :</th>
                                                <td>{{ $booking->penginapan }}</></td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">Tarikh Kelulusan:</th>
                                                <td>{{ Carbon\Carbon::parse($booking->updated_at)->format('D, d-m-Y H:i A')}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12"><br>
                                    <h4>
                                        Jadual Bertolak
                                        <small class="float-right"></small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tarikh / Masa Bertolak</th>
                                            <th>Sektor Perjalanan / Destinasi</th>
                                            <th>Negeri</th>
                                            <th>Pemandu Pergi</th>
                                            <th>Nombor Telefon</th>
                                            <th>Jenis Kenderaan</th>
                                            <th>No Pendaftaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ Carbon\Carbon::parse($booking->start_date)->format('D, d/m/Y H:i A')}}</td>
                                            <td>{{ $booking->destinasi }}</td>
                                            <td>{{ $booking->negeri }}</td>
                                            <td>{{ $booking->driver->nama_pemandu}}</td>
                                            <td>{{ $booking->driver->notelefon }}</td>
                                            <td>{{ $booking->vehicle->vehicle }}</td>
                                            <td>{{ $booking->vehicle->nodaftar }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12"><br>
                                <h4>
                                    Jadual Pulang
                                    <small class="float-right"></small>
                                </h4>
                            </div>
                        </div>
                         <!-- Table row -->
                         <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tarikh / Masa Pulang</th>
                                            <th>Sektor Perjalanan / Destinasi</th>
                                            <th>Negeri</th>
                                            <th>Pemandu Pulang</th>
                                            <th>Nombor Telefon</th>
                                            <th>Jenis Kenderaan</th>
                                            <th>No Pendaftaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ Carbon\Carbon::parse($booking->end_date)->format('D, d/m/Y H:i A')}}</td>
                                            <td>{{ $booking->destinasi }}</td>
                                            <td>{{ $booking->negeri }}</td>
                                            <td>{{ $booking->namapemandu2}}</td>
                                            <td>{{ $booking->notelpemandu2 }}</td>
                                            <td>{{ $booking->jeniskenderaan2 }}</td>
                                            <td>{{ $booking->nopendaftaran2 }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <div class="col-12"><br>
                            <h4>
                                <i class="fas fa-book"></i>Arahan Penugasan Rasmi Pemandu
                                <p class="lead">
                                    Tuan adalah diarahkan menjalankan tugas membawa / menghantar pemohon / penumpang bagi tujuan urusan rasmi yang 
                                    tersebut pada tarikh, masa dan sektor perjalanan yang diperlukan.
                                </p>
                            </h4>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                    <p>……………………………………………………………</p>
                                    (Pengarah Pendidikan Negeri 
                                    / Pegawai Kenderaan /Pegawai Yang Diberi Kuasa)
                                </p>
                                <p>Tarikh:</p>
                            </div> 
                            <div class="col-6">
                                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                        Sila pastikan perkara-perkara berikut dipatuhi:
                                        1.	Kunci Kenderaan, Buku Log, Kad Minyak dan Touch & Go yang betul diperolehi.<br>
                                        2.	Memeriksa keadaan kesiapsiagaan dan keselamatan kenderaan sebelum perjalanan rasmi<br>
                                        3.	Kemaskini dengan catatan yang teratur dan tepat di Buku Log sebelum memulakan dan setelah mengakhiri perjalanan rasmi.                                    
                                    </p>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <a href="" class="btn btn-default"><i
                                        class="fas fa-print"></i> Cetak</a>
                                <a href="{{ route('users.bookings.index') }}" type="button" class="btn btn-success float-right" style="margin-right: 5px;">
                                    <i class="fas fa-download">Kembali</i> 
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    window.addEventListener("load", window.print());
</script>
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
             "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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

