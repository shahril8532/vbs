@extends('adminlte::page')

@section('title', 'Pengguna Tempahan | Dashboard')

@section('content_header')
    <h1>Pengguna Tempahan</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div id="errorBox"></div>
        <div class="col-3">
            <form method="POST" action="{{route('users.penggunas.store')}}">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h5>Tambah Baru</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nokadpengenalan" class="form-label">No Kad Pengenalan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nokadpengenalan" placeholder="No Kad Pengenalan" value="{{old('nokadpengenalan')}}">
                            @if($errors->has('nokadpengenalan'))
                                <span class="text-danger">{{$errors->first('nokadpengenalan')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="nama_pengguna" class="form-label">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{old('nama')}}">
                            @if($errors->has('nama'))
                                <span class="text-danger">{{$errors->first('nama')}}</span>
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
                            <label class="form-label">Sektor / Unit<span class="text-danger">*</span></label>
                            <select name="sektor" class="form-control @error('sektor') is-invalid @enderror">
                                <option selected disabled>- Sila Pilih -</option>
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
                            <input type="text" class="form-control" name="notelefon" placeholder="No Telefon" value="{{old('notelefon')}}">
                            @if($errors->has('notelefon'))
                                <span class="text-danger">{{$errors->first('notelefon')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status<span class="text-danger">*</span></label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror">
                                <option selected disabled>-Sila Pilih-</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                            @if($errors->has('status'))
                            <span class="text-danger">{{$errors->first('status')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h5>Senarai Pengguna</h5>
                    </div>
                </div>
                <div class="card-body">    
                    <!--DataTable-->
                    <div class="table-responsive">
                        <div class="row">
                            <!--<div class="col-sm-12 col-md-6">
                                <div class="dt-buttons btn-group flex-wrap">               
                                    <button class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1" type="button">
                                        <span>CSV</span>
                                    </button> 
                                    <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1" type="button">
                                        <span>Excel</span>
                                    </button> 
                                    <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button">
                                        <span>PDF</span>
                                    </button> 
                                    <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1" type="button">
                                        <span>Cetak</span>
                                    </button> 	
                                </div>
                            </div>-->
                        </div>
                    <table id="tblData" class="table table-bordered table-striped dataTable dtr-inline">
                            <thead>
                                <tr>
                                    <th>Bil</th>
                                    <th>No Kad Pengenalan</th>
                                    <th>Nama</th>
                                    <th>Jawatan</th>
                                    <th>Sektor / Unit</th>
                                    <th>No Telefon</th>
                                    <th>Status</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Bil</th>
                                    <th>No Kad Pengenalan</th>
                                    <th>Nama</th>
                                    <th>Jawatan</th>
                                    <th>Sektor / Unit</th>
                                    <th>No Telefon</th>
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
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
     //$(function (){
     //  $('#select2').select2();
     //});
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $(document).ready(function(){
        var table = $('#tblData').DataTable({
            reponsive:true, 
            processing:true, 
            serverSide:true, 
            autoWidth:false, 
            ajax:"{{route('users.penggunas.index')}}", 
            columns:[
                {data:'DT_RowIndex', name:'id'},
                {data:'nokadpengenalan', name:'nokadpengenalan'},
                {data:'nama', name:'nama'},
                {data:'jawatan', name:'jawatan'},
                {data:'sektor', name:'sektor'},
                {data:'notelefon', name:'notelefon'},
                {data:'status', name:'status'},
                {data:'action', name:'action', bSortable:false, className:"text-center"},
            ], 
            //order:[[0, "desc"]]
            bDestory:true,
        });
        $('body').on('click', '#btnDel', function(){
            //confirmation
            var id = $(this).data('id');
            if(confirm('Hapus Rekod '+id+'?')==true)
            {
                var route = "{{route('users.penggunas.destroy', ':id')}}"; 
                route = route.replace(':id', id);
                $.ajax({
                    url:route, 
                    type:"delete", 
                    success:function(res){
                        console.log(res);
                        $("#tblData").DataTable().ajax.reload();
                    },
                    error:function(res){
                        $('#errorBox').html('<div class="alert alert-dander">'+response.message+'</div>');
                    }
                });
            }else{
                //do nothing
            }
        });
});
</script>
@stop

@section('plugins.Datatables', true)
@section('plugins.Select2', true)

@section('footer')
<strong>Copyright &copy; 2023 <a href="https://jpnmelaka.moe.gov.my/">Sektor Pengurusan Maklumat Jabatan Pendidikan Negeri Melaka</a>.</strong>
    HakCipta Terpelihara.
    <div class="float-right d-none d-sm-inline-block">
    <b>Dibangunkan Oleh</b> Webmaster
    </div>
@stop


