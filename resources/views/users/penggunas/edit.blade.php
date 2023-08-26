@extends('adminlte::page')

@section('title', 'Kemaskini Pengguna | Dashboard')

@section('content_header')
    <h1>Kemaskini Pegguna</h1>
@stop

@section('content')
   <div class="container-fluid">
    <div class="row">
        <div id="errorBox"></div>
        <div class="col-3">
            <form method="POST" action="{{route('users.penggunas.update', $pengguna->id)}}">
                @method('patch')
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h5>Kemaskini</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nokadpengenalan" class="form-label">No Kad Pengenalan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nokadpengenalan" placeholder="No Kad Pengenalan" value="{{$pengguna->nokadpengenalan}}">
                            @if($errors->has('nokadpengenalan'))
                                <span class="text-danger">{{$errors->first('nokadpengenalan')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="nama_pemandu" class="form-label">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{$pengguna->nama}}">
                            @if($errors->has('nama'))
                                <span class="text-danger">{{$errors->first('nama')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jawatan<span class="text-danger">*</span></label>
                            <select name="jawatan" class="form-control @error('jawatan') is-invalid @enderror">
                                <option value="{{$pengguna->jawatan }}">{{$pengguna->jawatan }}</option>
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
                            <label class="form-label">Sektor / Unit<span class="text-danger">*</span></label>
                            <select name="sektor" class="form-control @error('sektor') is-invalid @enderror">
                                <option value="{{$pengguna->sektor }}">{{$pengguna->sektor }}</option>
                                <option value="Unit Pengarah / Pegawai Kanan">Unit Pengarah / Pegawai Kanan</option>
                                <option value="Sektor Perancangan Dan Pembangunan PPD">Sektor Perancangan Dan Pembangunan PPD
                                </option>
                                <option value="Sektor Pembelajaran - Bahasa">Sektor Pembelajaran - Bahasa</option>
                                <option value="Sektor Pembelajaran - Sains Dan Matematik">Sektor Pembelajaran - Sains Dan
                                    Matematik</option>
                                <option value="Sektor Pembelajaran - Sains Sosial">Sektor Pembelajaran - Sains Sosial</option>
                                <option value="Sektor Pembelajaran - Teknik Dan Vokasional">Sektor Pembelajaran - Teknik Dan
                                    Vokasional</option>
                                <option value="Sektor Pembelajaran - Teknologi Maklumat Dan Komunikasi">Sektor Pembelajaran -
                                    Teknologi Maklumat Dan Komunikasi</option>
                                <option value="Sektor Pengurusan Sekolah - Menengah Dan Tingkatan 6">Sektor Pengurusan Sekolah
                                    - Menengah Dan Tingkatan 6</option>
                                <option value="Sektor Pengurusan Sekolah - Prasekolah Dan Rendah">Sektor Pengurusan Sekolah -
                                    Prasekolah Dan Rendah</option>
                                <option value="Sektor Pengurusan Sekolah - Pendidikan Swasta">Sektor Pengurusan Sekolah -
                                    Pendidikan Swasta</option>
                                <option value="Sektor Pengurusan Sekolah - Sekolah Jenis Khas">Sektor Pengurusan Sekolah -
                                    Sekolah Jenis Khas</option>
                                <option value="Sektor Pembangunan Murid - Hal Ehwal Murid">Sektor Pembangunan Murid - Hal Ehwal
                                    Murid</option>
                                <option value="Sektor Pembangunan Murid - Pembangunan Bakat Murid">Sektor Pembangunan Murid -
                                    Pembangunan Bakat Murid</option>
                                <option value="Sektor Pembangunan Murid - Pusat Kokurikulum">Sektor Pembangunan Murid - Pusat
                                    Kokurikulum</option>
                                <option value="Sektor Pendidikan Islam - Perancangan Dan Pembangunan">Sektor Pendidikan Islam -
                                    Perancangan Dan Pembangunan</option>
                                <option value="Sektor Pendidikan Islam - Pembangunan Adab Dan Nilai">Sektor Pendidikan Islam -
                                    Pembangunan Adab Dan Nilai</option>
                                <option value="Sektor Pendidikan Khas">Sektor Pendidikan Khas</option>
                                <option value="Sektor Sumber Manusia - Perjawatan Dan Perkhidmatan">Sektor Sumber Manusia -
                                    Perjawatan Dan Perkhidmatan</option>
                                <option value="Sektor Sumber Manusia - Pengurusan Bakat">Sektor Sumber Manusia - Pengurusan
                                    Bakat</option>
                                <option value="Sektor Infrastruktur Dan Perolehan - Pembangunan Dan Pengurusan Infrastruktur">
                                    Sektor Infrastruktur Dan Perolehan - Pembangunan Dan Pengurusan Infrastruktur</option>
                                <option value="Sektor Infrastruktur Dan Perolehan - Perolehan">Sektor Infrastruktur Dan
                                    Perolehan - Perolehan</option>
                                <option value="Sektor Pengurusan - Kewangan">Sektor Pengurusan - Kewangan</option>
                                <option value="Sektor Pengurusan - Akaun">Sektor Pengurusan - Akaun</option>
                                <option value="Sektor Pengurusan - Pentadbiran AM">Sektor Pengurusan - Pentadbiran AM</option>
                                <option value="Sektor Sumber Teknologi Pendidikan">Sektor Sumber Teknologi Pendidikan</option>
                                <option value="Sektor Pentaksiran Dan Peperiksaan">Sektor Pentaksiran Dan Peperiksaan</option>
                                <option value="Sektor Pengurusan Maklumat">Sektor Pengurusan Maklumat</option>
                                <option value="Sektor Psikologi Dan Kaunseling">Sektor Psikologi Dan Kaunseling</option>
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
                            <label for="notelefon" class="form-label">No Telefon <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="notelefon" placeholder="No Telefon" value="{{$pengguna->notelefon}}">
                            @if($errors->has('notelefon'))
                                <span class="text-danger">{{$errors->first('notelefon')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                            <select class="form-control select2"  id="select2" data-placeholder="Sila Pilih" name="status">
                            <option value="{{$pengguna->status }}">{{$pengguna->status }}</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('users.penggunas.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Kemaskini</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
   </div>
@stop