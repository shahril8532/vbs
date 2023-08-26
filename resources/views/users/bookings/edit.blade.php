@extends('adminlte::page')

@section('title', 'Kemaskini Tempahan')

@section('content_header')
    <h1>Kemaskini Tempahan</h1>
@stop

@section('content')
<form method="POST" action="{{route('users.bookings.update',$booking->id)}}"> 
    @method('patch')
    @csrf
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Surat /Dokumen Rasmi (Sila Muat Dokumen / Surat Rasmi)</h3>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="file" name="image" class="form-control" placeholder="Sila Upload Gambar / Surat"
                        class="custom-file-label" for="exampleInputFile">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">A. PERMOHONAN (dilengkapkan oleh pengguna / wakil
                            pengguna
                            dari Sektor /
                            Unit)</h3>
                    </div>
                    <div class="card-body">
                        <div id="actions" class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Nama Pemohon<span class="text-danger">*</span></label>
                                    <select name="pengguna_id" class="form-control @error('pengguna_id') is-invalid @enderror">
                                        <option value="{{$booking->pengguna->nama }}">{{$booking->pengguna->nama }}</option>
                                    </select>
                                    @error('pengguna_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Jawatan<span class="text-danger">*</span></label>
                                    <select name="jawatan" class="form-control @error('jawatan') is-invalid @enderror">
                                        <option value="{{$booking->pengguna->jawatan }}">{{$booking->pengguna->jawatan }}</option>
                                    </select>
                                    @error('pengguna_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Maklumat Pengguna<span
                                            class="text-danger">*</span></label>
                                    <span class="text-muted mt-3">(Jika lain dari pemohon)</span>
                                    <input type="text" class="form-control" name="namapengguna"
                                        placeholder="Nama Pengguna"
                                        value="{{old('namapengguna',$booking->namapengguna)}}">
                                    @if ($errors->has('namapengguna'))
                                        <span
                                            class="text-danger">{{ $errors->first('namapengguna') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Jenis Tugas Rasmi<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" row="3" name="jenis" id="jenis" placeholder="Jenis Tugas Rasmi" autocomplete="jenis"
                                    autofocus>{{{ old('jenis',$booking->jenis) }}}</textarea>
                                    @if ($errors->has('jenis'))
                                        <span class="text-danger">{{ $errors->first('jenis') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Bilangan Penumpang<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="bilangan"
                                        placeholder="Bilangan Penumpang"
                                        value="{{old('bilangan',$booking->bilangan)}}">
                                    @if ($errors->has('bilangan'))
                                        <span
                                            class="text-danger">{{ $errors->first('bilangan') }}</span>
                                    @endif
                                </div>
                                <!--<div class="form-group">
                                    <label class="form-label">Alamat E-mel<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="emel"
                                        placeholder="@ Emel Yang Aktif"
                                        value="{{old('emel',$booking->emel)}}">
                                    @if ($errors->has('emel'))
                                        <span
                                            class="text-danger">{{ $errors->first('emel') }}</span>
                                    @endif
                                </div>-->
                            </div>
                            <div class="col-lg-6 ">
                                <div class="form-group">
                                    <label class="form-label">Nombor Telefon<span class="text-danger">*</span></label>
                                    <select name="notel" class="form-control @error('notel') is-invalid @enderror">
                                        <option value="{{$booking->pengguna->notelefon }}">{{$booking->pengguna->notelefon }}</option>   
                                    </select>
                                    @error('notel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Sektor / Unit<span class="text-danger">*</span></label>
                                    <select name="sektor" class="form-control @error('sektor') is-invalid @enderror">
                                        <option value="{{$booking->pengguna->sektor }}">{{$booking->pengguna->sektor }}</option>   
                                    </select>
                                    @error('sektor')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Tujuan<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="tujuan"
                                        placeholder="Tujuan" value="{{old('tujuan',$booking->tujuan)}}">
                                    @if ($errors->has('tujuan'))
                                        <span
                                            class="text-danger">{{ $errors->first('tujuan') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Jarak Perjalanan Sehala /KM <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="jarak"
                                        placeholder="Masukkan Jarak Perjalanan Sehala"
                                        value="{{old('jarak',$booking->jarak)}}">
                                    @if ($errors->has('jarak'))
                                        <span class="text-danger">{{ $errors->first('jarak') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nama Penumpang<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" row="3" name="namapenumpang" placeholder="Nama Penumpang" autocomplete="namapenumpang"
                                    autofocus>{{{ old('namapenumpang',$booking->namapenumpang) }}}</textarea>
                                    @if ($errors->has('namapenumpang'))
                                        <span
                                            class="text-danger">{{ $errors->first('namapenumpang') }}</span>
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
                        <h3 class="card-title">Jadual Pergerakan Tugas Rasmi /Sektor Perjalanan</h3>
                    </div>
                    <div class="card-body">
                        <div id="actions" class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <i class="far fa-calendar-alt"> </i>
                                    <label>Tarikh Guna & Masa Bertolak<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="start_date" class="form-control" placeholder="Sila Pilih Tarikh/Masa" 
                                    value="{{old('start_date',$booking->start_date)}}" required>
                                    @if ($errors->has('start_date'))
                                        <span
                                            class="text-danger">{{ $errors->first('start_date') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Sektor Perjalanan <span
                                            class="text-danger">*</span></label>
                                    <span class="text-muted mt-3">(Destinasi perjalanan)</span>
                                    <input type="text" class="form-control" name="destinasi"
                                        placeholder="Destinasi Perjalanan"
                                        value="{{old('destinasi',$booking->destinasi)}}">
                                    @if ($errors->has('destinasi'))
                                        <span
                                            class="text-danger">{{ $errors->first('destinasi') }}</span>
                                    @endif
                                </div>  
                            </div>
                            <div class="col-lg-6 ">
                                <div class="form-group">
                                    <i class="far fa-calendar-alt"> </i>
                                    <label>Tarikh & Masa Pulang<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="end_date" class="form-control" placeholder="Sila Pilih Tarikh/Masa" 
                                    value="{{old('end_date',$booking->end_date)}}" required>
                                    @if ($errors->has('end_date'))
                                        <span
                                            class="text-danger">{{ $errors->first('end_date') }}</span>
                                    @endif
                                </div>   
                                <div class="form-group">
                                    <label class="form-label">Negeri<span class="text-danger">*</span></label>
                                    <select name="negeri" class="form-control @error('negeri') is-invalid @enderror">
                                        <option value="{{$booking->negeri }}">{{$booking->negeri }}</option>
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
            <div class="col-md-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">B. PERTIMBANGAN DAN KELULUSAN </h3><br>
                        Permohonan menggunakan kenderaan bagi tujuan urusan rasmi adalah; 
                    </div>
                    <div class="card-body">.
                        <div id="actions" class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Status<span class="text-danger">*</span></label>
                                    <select class="form-control select2"  id="select2" data-placeholder="Sila Pilih" name="status">
                                    <option value="{{$booking->status }}">{{$booking->status }}</option>
                                    <option value="LULUS">LULUS</option>
                                    <option value="TIDAK BERJAYA">TIDAK BERJAYA</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Keperluan Pemandu Bermalam<span class="text-danger">*</span></label><br>
                                    Pemandu Hantar dan Ambil Sahaja (Tidak Bermalam)
                                    <select name="keperluan" class="form-control @error('keperluan') is-invalid @enderror">
                                        <option value="{{$booking->keperluan }}">{{old('keperluan',$booking->keperluan) }}</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                    @if ($errors->has('keperluan'))
                                        <span class="text-danger">{{ $errors->first('keperluan') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <div class="form-group">
                                    <label class="form-label">Penginapan Pemandu Disediakan<span class="text-danger">*</span></label><br>
                                    Hantar dan Bermalam hingga selesai program 
                                    (Luar Stesen melebihi 240km atau melebih 4 jam perjalanan sehala atau atas keperluan program)
                                    <select name="penginapan" class="form-control @error('penginapan') is-invalid @enderror">
                                        <option value="{{$booking->penginapan }}">{{old('penginapan',$booking->penginapan) }}</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                    @if ($errors->has('penginapan'))
                                        <span class="text-danger">{{ $errors->first('penginapan') }}</span>
                                    @endif
                                </div> 
                                <div class="form-group">
                                    <label class="form-label">Catatan<span
                                            class="text-danger">*</span></label>
                                            <textarea class="form-control" row="3" name="catatan" placeholder="Catatan" autocomplete="catatan"
                                            autofocus>{{{ old('catatan',$booking->catatan) }}}</textarea>
                                    @if ($errors->has('catatan'))
                                        <span
                                            class="text-danger">{{ $errors->first('catatan') }}</span>
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
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">C. ARAHAN PENUGASAN RASMI PEMANDU</h3><br>
                        Tuan adalah diarahkan menjalankan tugas membawa / menghantar pemohon / penumpang bagi tujuan urusan rasmi yang 
                        tersebut pada tarikh, masa dan sektor perjalanan yang diperlukan seperti yang dinyatakan di Bahagian A permohonan;
                    </div>
                    <div class="card-body">
                        <div id="actions" class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Nama Pemandu 1<span
                                            class="text-danger">*</span></label>
                                    <select name="driver_id" id="driver_id"
                                        class="form-control @error("driver_id") is-invalid @enderror">
                                        <option selected disabled>- Sila Pilih Nama Pemandu 1-</option>
                                        <option value="Tiada">- Tiada-</option>
                                        @foreach ($drivers as $row)
                                        <option value="{{ $row->id }}" {{ old('row_id',$booking->row_id) == $row->id ? 'selected' : null }}>{{($row->nama_pemandu) }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('driver_id'))
                                        <span
                                            class="text-danger">{{ $errors->first('driver_id') }}</span>
                                    @endif
                                </div>
                                <!--<div class="form-group">
                                    <label class="form-label">Nombor Telefon Pemandu 1<span
                                            class="text-danger">*</span></label>
                                    <select name="notelpemandu1" id="notelpemandu1"
                                        class="form-control @error("notelpemandu1") is-invalid @enderror">
                                        <option selected disabled>- Sila Pilih Nombor Telefon Pemandu 1-</option>
                                        <option value="Tiada">- Tiada-</option>
                                        @foreach ($drivers as $driver)
                                        <option value="{{$driver->id}}">{{old('notelpemandu1',$driver->notelefon)}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('notelpemandu1'))
                                        <span
                                            class="text-danger">{{ $errors->first('notelpemandu1') }}</span>
                                    @endif
                                </div>-->
                                <!--<div class="form-group">
                                    <label class="form-label">Nombor Pendaftaran Kenderaan(Bertolak)<span
                                            class="text-danger">*</span></label>
                                    <select name="nopendaftaran" id="nopendaftaran"
                                        class="form-control @error("nopendaftaran") is-invalid @enderror">
                                        <option selected disabled>- Sila Pilih Nombor Pendaftaran Kenderaan Bertolak-</option>
                                        <option value="Tiada">- Tiada-</option>
                                        @foreach ($vehicles as $row)
                                        <option value="{{ $row->id }}"
                                            {{ isset($bookings) ? ($bookings->vehicle_id == $row->id ? 'selected' : '') : '' }}>
                                            {{ $row->nodaftar }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('nopendaftaran'))
                                        <span
                                            class="text-danger">{{ $errors->first('nopendaftaran') }}</span>
                                    @endif
                                </div>-->
                                <div class="form-group">
                                    <label class="form-label">Nombor Pendaftaran Kenderaan(Bertolak)<span
                                            class="text-danger">*</span></label>
                                    <select name="vehicle_id" id="vehicle_id"
                                        class="form-control @error("vehicle_id") is-invalid @enderror">
                                        <option selected disabled>- Sila Pilih Nombor Pendaftaran Kenderaan Bertolak-</option>
                                        <option value="Tiada">- Tiada-</option>
                                        @foreach ($vehicles as $row)
                                        <option value="{{ $row->id }}"
                                            {{ isset($bookings) ? ($bookings->vehicle_id == $row->id ? 'selected' : '') : '' }}>
                                            {{ $row->nodaftar }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('vehicle_id'))
                                        <span
                                            class="text-danger">{{ $errors->first('vehicle_id') }}</span>
                                    @endif
                                </div>
                                
                            </div>
                            <div class="col-lg-6 ">
                                <div class="form-group">
                                    <label class="form-label">Nama Pemandu 2<span
                                            class="text-danger">*</span></label>
                                    <select name="namapemandu2" id="namapemandu2"
                                        class="form-control @error("namapemandu2") is-invalid @enderror">
                                        <option selected disabled>- Sila Pilih Nama Pemandu 2 -</option>
                                        <option value="Tiada">- Tiada-</option>
                                        @foreach ($drivers as $driver)
                                        <option value="{{$driver->nama_pemandu}}">{{old('namapemandu2',$driver->nama_pemandu)}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('namapemandu2'))
                                        <span
                                            class="text-danger">{{ $errors->first('namapemandu2') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nombor Telefon Pemandu 2<span
                                            class="text-danger">*</span></label>
                                    <select name="notelpemandu2" id="notelpemandu2"
                                        class="form-control @error("notelpemandu2") is-invalid @enderror">
                                        <option selected disabled>- Sila Pilih Nombor Telefon Pemandu 2 -</option>
                                        <option value="Tiada">- Tiada-</option>
                                        @foreach ($drivers as $driver)
                                        <option value="{{$driver->notelefon}}">{{old('notelpemandu2',$driver->notelefon)}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('notelpemandu2'))
                                        <span
                                            class="text-danger">{{ $errors->first('notelpemandu2') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Jenis Kenderaan (Pulang)<span
                                            class="text-danger">*</span></label>
                                    <select name="jeniskenderaan2" id="jeniskenderaan2"
                                        class="form-control @error("jeniskenderaan2") is-invalid @enderror">
                                        <option selected disabled>- Sila Pilih Kenderaan Pulang-</option>
                                        <option value="Tiada">- Tiada-</option>
                                        <option value="KERETA">KERETA</option>
                                        <option value="SUV">SUV</option>
                                        <option value="VAN">VAN</option>
                                        <option value="BAS">BAS</option>
                                        <option value="HILUX">HILUX</option>
                                    </select>
                                    @if ($errors->has('jeniskenderaan2'))
                                        <span
                                            class="text-danger">{{ $errors->first('jeniskenderaan2') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nombor Pendaftaran Kenderaan(Pulang)<span
                                            class="text-danger">*</span></label>
                                    <select name="nopendaftaran2" id="nopendaftaran2"
                                        class="form-control @error("nopendaftaran2") is-invalid @enderror">
                                        <option selected disabled>- Sila Pilih Nombor Pendaftaran Kenderaan Pulang-</option>
                                        <option value="Tiada">- Tiada-</option>
                                        @foreach ($vehicles as $vehicle)
                                        <option value="{{$vehicle->nodaftar}}">{{old('nopendaftaran2',$vehicle->nodaftar)}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('nopendaftaran2'))
                                        <span
                                            class="text-danger">{{ $errors->first('nopendaftaran2') }}</span>
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
        <button type="submit" class="btn btn-primary">Kemaskini</button>
    </div>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')

@stop