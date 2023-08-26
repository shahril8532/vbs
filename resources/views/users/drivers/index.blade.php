@extends('adminlte::page')

@section('title', 'Pemandu | Dashboard')

@section('content_header')
    <h1>Pemandu</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div id="errorBox"></div>
        <div class="col-3">
            <form method="POST" action="{{route('users.drivers.store')}}">
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
                            <label for="nama_pemandu" class="form-label">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nama_pemandu" placeholder="Nama" value="{{old('nama_pemandu')}}">
                            @if($errors->has('nama_pemandu'))
                                <span class="text-danger">{{$errors->first('nama_pemandu')}}</span>
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
                                <option value="Cuti Sakit">Cuti Sakit</option>
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
                        <h5>Senarai Pemandu</h5>
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
            ajax:"{{route('users.drivers.index')}}", 
            columns:[
                {data:'DT_RowIndex', name:'id'},
                {data:'nokadpengenalan', name:'nokadpengenalan'},
                {data:'nama_pemandu', name:'nama_pemandu'},
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
            if(confirm('Delete Data '+id+'?')==true)
            {
                var route = "{{route('users.drivers.destroy', ':id')}}"; 
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


