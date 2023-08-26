@extends('adminlte::page')

@section('title', 'Tempahan')

@section('content_header')
    <h1>BORANG TEMPAHAN</h1>
@stop

@section('content')
    <div class="col-md-12">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">SURAT /DOKUMEN RASMI (Sila Muat Dokumen / Surat Rasmi)</h3>
                <div class="form-group">
                    <label for="exampleInputFile"></label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Pilih Fail</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">A. PERMOHONAN (dilengkapkan oleh pengguna / wakil pengguna dari Sektor /
                            Unit)</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="actions" class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Nama Pemohon<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama Pemohon"
                                        value="{{ old('nama') }}">
                                    @if ($errors->has('nama'))
                                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                  <label class="form-label">Jawatan<span class="text-danger">*</span></label>
                                  <select name="jawatan" class="form-control @error('jawatan') is-invalid @enderror">
                                      <option selected disabled>- Sila Pilih -</option>
                                      <option value="Pengarah">Pengarah</option>
                                      <option value="Timbalan Pengarah">Timbalan Pengarah</option>
                                      <option value="Ketua Penolong Pengarah Kanan">Ketua Penolong Pengarah Kanan</option>
                                      <option value="Ketua Penolong Pengarah">Ketua Penolong Pengarah</option>
                                      <option value="Penolong Pengarah">Penolong Pengarah</option>
                                      <option value="Penolong Pegawai">Penolong Pegawai</option>
                                      <option value="Ketua Pembantu Tadbir">Ketua Pembantu Tadbir</option>
                                      <option value="Juruteknik">Juruteknik</option>
                                      <option value="Pembantu Tadbir">Pembantu Tadbir</option>
                                      <option value="Pembantu Am Pejabat">Pembantu Am Pejabat</option>
                                      <option value="Pemandu">Pemandu</option>
                                  </select>
                                  @if ($errors->has('jawatan'))
                                      <span class="text-danger">{{ $errors->first('jawatan') }}</span>
                                  @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Maklumat Pengguna<span class="text-danger">*</span></label>
                                    <span class="text-muted mt-3">(Jika lain dari pemohon)</span>
                                    <input type="text" class="form-control" name="namapengguna"
                                        placeholder="Nama Pengguna" value="{{ old('namapengguna') }}">
                                    @if ($errors->has('namapengguna'))
                                        <span class="text-danger">{{ $errors->first('namapengguna') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Bilangan Penumpang<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="bilangan"
                                        placeholder="Bilangan Penumpang" value="{{ old('bilangan') }}">
                                    @if ($errors->has('bilangan'))
                                        <span class="text-danger">{{ $errors->first('bilangan') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nama Penumpang<span class="text-danger">*</span></label>
                                    <textarea type="text" class="form-control" row="3" name="namapenumpang" placeholder="Nama Penumpang"
                                        value="{{ old('namapenumpang') }}"></textarea>
                                    @if ($errors->has('namapenumpang'))
                                        <span class="text-danger">{{ $errors->first('namapenumpang') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <div class="form-group">
                                    <label class="form-label">Nombor Telefon <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="notel"
                                        placeholder="Nombor Telefon" value="{{ old('notel') }}">
                                    @if ($errors->has('notel'))
                                        <span class="text-danger">{{ $errors->first('notel') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                  <label class="form-label">Sektor / Unit<span class="text-danger">*</span></label>
                                  <select name="sektor" class="form-control @error('sektor') is-invalid @enderror">
                                      <option selected disabled>- Sila Pilih -</option>
                                      <option value="Unit Pengarah / Pegawai Kanan">Unit Pengarah / Pegawai Kanan</option>
                                      <option value="Sektor Perancangan Dan Pembangunan PPD">Sektor Perancangan Dan
                                          Pembangunan PPD
                                      </option>
                                      <option value="Sektor Pembelajaran - Bahasa">Sektor Pembelajaran - Bahasa</option>
                                      <option value="Sektor Pembelajaran - Sains Dan Matematik">Sektor Pembelajaran -
                                          Sains Dan
                                          Matematik</option>
                                      <option value="Sektor Pembelajaran - Sains Sosial">Sektor Pembelajaran - Sains
                                          Sosial</option>
                                      <option value="Sektor Pembelajaran - Teknik Dan Vokasional">Sektor Pembelajaran -
                                          Teknik Dan
                                          Vokasional</option>
                                      <option value="Sektor Pembelajaran - Teknologi Maklumat Dan Komunikasi">Sektor
                                          Pembelajaran -
                                          Teknologi Maklumat Dan Komunikasi</option>
                                      <option value="Sektor Pengurusan Sekolah - Menengah Dan Tingkatan 6">Sektor
                                          Pengurusan Sekolah
                                          - Menengah Dan Tingkatan 6</option>
                                      <option value="Sektor Pengurusan Sekolah - Prasekolah Dan Rendah">Sektor Pengurusan
                                          Sekolah -
                                          Prasekolah Dan Rendah</option>
                                      <option value="Sektor Pengurusan Sekolah - Pendidikan Swasta">Sektor Pengurusan
                                          Sekolah -
                                          Pendidikan Swasta</option>
                                      <option value="Sektor Pengurusan Sekolah - Sekolah Jenis Khas">Sektor Pengurusan
                                          Sekolah -
                                          Sekolah Jenis Khas</option>
                                      <option value="Sektor Pembangunan Murid - Hal Ehwal Murid">Sektor Pembangunan Murid
                                          - Hal Ehwal
                                          Murid</option>
                                      <option value="Sektor Pembangunan Murid - Pembangunan Bakat Murid">Sektor
                                          Pembangunan Murid -
                                          Pembangunan Bakat Murid</option>
                                      <option value="Sektor Pembangunan Murid - Pusat Kokurikulum">Sektor Pembangunan
                                          Murid - Pusat
                                          Kokurikulum</option>
                                      <option value="Sektor Pendidikan Islam - Perancangan Dan Pembangunan">Sektor
                                          Pendidikan Islam -
                                          Perancangan Dan Pembangunan</option>
                                      <option value="Sektor Pendidikan Islam - Pembangunan Adab Dan Nilai">Sektor
                                          Pendidikan Islam -
                                          Pembangunan Adab Dan Nilai</option>
                                      <option value="Sektor Pendidikan Khas">Sektor Pendidikan Khas</option>
                                      <option value="Sektor Sumber Manusia - Perjawatan Dan Perkhidmatan">Sektor Sumber
                                          Manusia -
                                          Perjawatan Dan Perkhidmatan</option>
                                      <option value="Sektor Sumber Manusia - Pengurusan Bakat">Sektor Sumber Manusia -
                                          Pengurusan
                                          Bakat</option>
                                      <option
                                          value="Sektor Infrastruktur Dan Perolehan - Pembangunan Dan Pengurusan Infrastruktur">
                                          Sektor Infrastruktur Dan Perolehan - Pembangunan Dan Pengurusan Infrastruktur
                                      </option>
                                      <option value="Sektor Infrastruktur Dan Perolehan - Perolehan">Sektor Infrastruktur
                                          Dan
                                          Perolehan - Perolehan</option>
                                      <option value="Sektor Pengurusan - Kewangan">Sektor Pengurusan - Kewangan</option>
                                      <option value="Sektor Pengurusan - Akaun">Sektor Pengurusan - Akaun</option>
                                      <option value="Sektor Pengurusan - Pentadbiran AM">Sektor Pengurusan - Pentadbiran
                                          AM</option>
                                      <option value="Sektor Sumber Teknologi Pendidikan">Sektor Sumber Teknologi
                                          Pendidikan</option>
                                      <option value="Sektor Pentaksiran Dan Peperiksaan">Sektor Pentaksiran Dan
                                          Peperiksaan</option>
                                      <option value="Sektor Pengurusan Maklumat">Sektor Pengurusan Maklumat</option>
                                      <option value="Sektor Psikologi Dan Kaunseling">Sektor Psikologi Dan Kaunseling
                                      </option>
                                      <option value="Sektor Integriti">Sektor Integriti</option>
                                      <option value="PPD Melaka Tengah">PPD Melaka Tengah</option>
                                      <option value="PPD Alor Gajah">PPD Alor Gajah</option>
                                      <option value="PPD Jasin">PPD Jasin</option>
                                  </select>
                                  @if ($errors->has('sektor'))
                                      <span class="text-danger">{{ $errors->first('sektor') }}</span>
                                  @endif
                                </div>
                                <div class="form-group">
                                  <label class="form-label">Jarak Perjalanan Sehala /KM <span class="text-danger">*</span></label>
                                  <input type="text" class="form-control" name="jarak"
                                      placeholder="Masukkan Jarak Perjalanan Sehala" value="{{ old('jarak') }}">
                                  @if ($errors->has('jarak'))
                                      <span class="text-danger">{{ $errors->first('jarak') }}</span>
                                  @endif
                                </div>
                                <div class="form-group">
                                  <label class="form-label">Jenis Tugas Rasmi<span class="text-danger">*</span></label>
                                  <textarea type="text" class="form-control" row="3" name="jenis" placeholder="Jenis Tugas Rasmi"
                                      value="{{ old('jenis') }}"></textarea>
                                  @if ($errors->has('jenis'))
                                      <span class="text-danger">{{ $errors->first('jenis') }}</span>
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
        <div class="row">
            <div class="col-12">
                <a href="{{ route('users.bookings.index') }}" class="btn btn-secondary">Batal</a>
                <!--<input type="submit" value="Hantar" class="btn btn-success float-right">-->
                <button type="submit" class="btn btn-success float-right">Hantar</button>
            </div>
        </div>
    </div>
    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
        <script>
            console.log('Hi!');
        </script>
    @stop
