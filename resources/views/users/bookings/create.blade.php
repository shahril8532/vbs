@extends('adminlte::page')

@section('title', 'Tempahan | Dashboard')

@section('content_header')
    <h1>Tempahan Baru</h1>
@stop

@section('content')
    <!--<form action="{{ route('users.bookings.store') }}" method="POST" enctype="multipart/form-data">-->
    <form action="{{ isset($bookings) ? route('users.bookings.update', $bookings->id) : route('users.bookings.store') }}"
        method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Surat /Dokumen Rasmi (Sila Muat Dokumen / Surat Rasmi)</h3>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="file" name="image" class="form-control" placeholder="Sila Upload Gambar / Surat"
                            class="custom-file-label" for="exampleInputFile"><br>
                            @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">A. Permohonan (dilengkapkan oleh pengguna / wakil
                                pengguna
                                dari Sektor /
                                Unit)</h3>
                        </div>
                        <div class="card-body">
                            <div id="actions" class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="pengguna_id" class="form-label">Nama Pemohon<span
                                                class="text-danger">*</span></label>
                                        <select name="pengguna_id" id="pengguna_id" type="hidden"
                                            class="form-control @error('pengguna_id') is-invalid @enderror">
                                            <option selected disabled>- Sila Pilih Nama -</option>
                                            @foreach ($penggunas as $row)
                                                <option value="{{ $row->id }}"
                                                    {{ isset($bookings) ? ($bookings->pengguna_id == $row->id ? 'selected' : '') : '' }}>
                                                    {{ $row->nama }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('pengguna_id'))
                                            <span class="text-danger">{{ $errors->first('pengguna_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="jawatan" class="form-label">Jawatan<span
                                                class="text-danger">*</span></label>
                                        <select name="jawatan" id="jawatan"
                                            class="form-control @error('jawatan') is-invalid @enderror">
                                            <option selected disabled>- Sila Pilih Jawatan -</option>
                                            @foreach ($penggunas as $row)
                                                <option value="{{ $row->jawatan }}"
                                                    {{ isset($bookings) ? ($bookings->pengguna_id == $row->id ? 'selected' : '') : '' }}>
                                                    {{ $row->jawatan }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('jawatan'))
                                            <span class="text-danger">{{ $errors->first('jawatan') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Maklumat Pengguna<span
                                                class="text-danger">*</span></label>
                                        <span class="text-muted mt-3">(Jika lain dari pemohon)</span>
                                        <input type="text" class="form-control" name="namapengguna"
                                            placeholder="Nama Pengguna" value="{{ old('namapengguna') }}">
                                        @if ($errors->has('namapengguna'))
                                            <span class="text-danger">{{ $errors->first('namapengguna') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Jenis Tugas Rasmi<span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" row="3" name="jenis" placeholder="Jenis Tugas Rasmi"
                                            value="{{ old('jenis') }}"></textarea>
                                        @if ($errors->has('jenis'))
                                            <span class="text-danger">{{ $errors->first('jenis') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Bilangan Penumpang<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="bilangan"
                                            placeholder="Bilangan Penumpang" value="{{ old('bilangan') }}">
                                        @if ($errors->has('bilangan'))
                                            <span class="text-danger">{{ $errors->first('bilangan') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Alamat E-mel<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="emel"
                                            placeholder="@ Emel Yang Aktif" value="{{ old('emel') }}">
                                        @if ($errors->has('emel'))
                                            <span class="text-danger">{{ $errors->first('emel') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 ">
                                    <div class="form-group">
                                        <label class="form-label">No Telefon<span class="text-danger">*</span></label>
                                        <select name="notel" id="notel"
                                            class="form-control @error('notel') is-invalid @enderror">
                                            <option selected disabled>- Sila Pilih Nombor Telefon -</option>
                                            @foreach ($penggunas as $pengguna)
                                                <option value="{{ $pengguna->notelefon }}">
                                                    {{ ucfirst($pengguna->notelefon) }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('notel'))
                                            <span class="text-danger">{{ $errors->first('notel') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Sektor / Unit<span class="text-danger">*</span></label>
                                        <select name="sektor" id="sektor"
                                            class="form-control @error('sektor') is-invalid @enderror">
                                            <option selected disabled>- Sila Pilih Sektor / Unit -</option>
                                            @foreach ($penggunas as $pengguna)
                                                <option value="{{ $pengguna->sektor }}">{{ ucfirst($pengguna->sektor) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('sektor'))
                                            <span class="text-danger">{{ $errors->first('sektor') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Tujuan<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="tujuan" placeholder="Tujuan"
                                            value="{{ old('tujuan') }}">
                                        @if ($errors->has('tujuan'))
                                            <span class="text-danger">{{ $errors->first('tujuan') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Jarak Perjalanan Sehala /KM <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="jarak"
                                            placeholder="Masukkan Jarak Perjalanan Sehala" value="{{ old('jarak') }}">
                                        @if ($errors->has('jarak'))
                                            <span class="text-danger">{{ $errors->first('jarak') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nama Penumpang<span class="text-danger">*</span></label>
                                        <textarea class="form-control" row="3" name="namapenumpang" placeholder="Nama Penumpang"
                                            value="{{ old('namapenumpang') }}"></textarea>
                                        @if ($errors->has('namapenumpang'))
                                            <span class="text-danger">{{ $errors->first('namapenumpang') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="table table-striped files" id="previews">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Jadual Pergerakan Tugas Rasmi / Sektor Perjalanan</h3>
                        </div>
                        <div class="card-body">
                            <div id="actions" class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <i class="far fa-calendar-alt"> </i>
                                        <label>Tarikh Guna & Masa Bertolak<span class="text-danger">*</span></label>
                                        <input type="text" name="start_date" class="flatpickr js-flatpickr-dateTime"
                                            placeholder="Sila Pilih Tarikh/Masa" required>
                                        @if ($errors->has('start_date'))
                                            <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Sektor Perjalanan <span
                                                class="text-danger">*</span></label>
                                        <span class="text-muted mt-3">(Destinasi perjalanan)</span>
                                        <input type="text" class="form-control" name="destinasi"
                                            placeholder="Destinasi Perjalanan" value="{{ old('destinasi') }}">
                                        @if ($errors->has('destinasi'))
                                            <span class="text-danger">{{ $errors->first('destinasi') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 ">
                                    <div class="form-group">
                                        <i class="far fa-calendar-alt"> </i>
                                        <label>Tarikh & Masa Pulang<span class="text-danger">*</span></label>
                                        <input type="text" name="end_date" class="flatpickr js-flatpickr-dateTime"
                                            placeholder="Sila Pilih Tarikh/Masa" required>
                                        @if ($errors->has('end_date'))
                                            <span class="text-danger">{{ $errors->first('end_date') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Negeri<span class="text-danger">*</span></label>
                                        <select name="negeri" class="form-control @error('negeri') is-invalid @enderror">
                                            <option selected disabled>- Sila Pilih -</option>
                                            <option value="Johor">Johor</option>
                                            <option value="Melaka">Melaka</option>
                                            <option value="Negeri Sembilan">Negeri Sembilan</option>
                                            <option value="Selangor">Selangor</option>
                                            <option value="W.P. Kuala Lumpur">W.P. Kuala Lumpur</option>
                                            <option value="W.P. Putrajaya">W.P. Putrajaya</option>
                                            <option value="Perak">Perak</option>
                                            <option value="Kedah">Kedah</option>
                                            <option value="Pulau Pinang">Pulau Pinang</option>
                                            <option value="Perlis">Perlis</option>
                                            <option value="Kelantan">Kelantan</option>
                                            <option value="Pahang">Pahang</option>
                                            <option value="Terengganu">Terengganu</option>
                                            <option value="Singapura">Singapura</option>
                                        </select>
                                        @if ($errors->has('negeri'))
                                            <span class="text-danger">{{ $errors->first('negeri') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="table table-striped files" id="previews">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <a href="{{ route('users.bookings.index') }}" class="btn btn-secondary">Batal</a>
            <!--<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>-->
            <button
                type="submit" class="btn btn-primary confirm-button">Hantar</button>
        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        flatpickr('.flatpickr.js-flatpickr-dateTime', {
            enableTime: true,
            time_24hr: true,
            altInput: true,
            //altFormat: 'd M Y H:i',
            //dateFormat: 'd-m-Y H:i',
            //altFormat: 'D, d-m-Y H:i A',
            dateFormat: 'D, d-m-Y H:i K',
            altFormat: "F j, Y h:i K"
            //dateFormat: "F j, Y h:i K"  
        });
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.confirm-button').click(function(event) {
        var form = $(this).closest("form");
        event.preventDefault();
        swal({
                title: `Adakah Anda Pasti Untuk Menghantar Permohonan Ini?`,
                text: "Permohonan akan diproses 3 hari bekerja.Sila pastikan alamat emel adalah Betul.Segala maklumat yang telah diisi tidak boleh dikemaskini.Pemohon akan diberikan Tempahan ID!.",
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
