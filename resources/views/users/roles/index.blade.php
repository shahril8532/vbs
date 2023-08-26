@extends('adminlte::page')

@section('title', 'Peranan | Dashboard')

@section('content_header')
    <h1>Peranan</h1>
@stop

@section('content')
   <div class="container-fluid">
       <div id="errorBox"></div>
       <div class="card">
           <div class="card-header">
               <div class="card-title">
                   <h5>Senarai Peranan</h5>
               </div>
               <a class="float-right btn btn-primary btn-xs m-0" href="{{route('users.roles.create')}}"><i class="fas fa-plus"></i> Tambah</a>
           </div>
           <div class="card-body">
               <!--DataTable-->
               <div class="table-responsive">
                   <table id="tblData" class="table table-bordered table-striped dataTable dtr-inline">
                       <thead>
                           <tr>
                               <th>Bil</th>
                               <th>Nama</th>
                               <th>Pengguna</th>
                               <th>Kebenaran</th>
                               <th>Tindakan</th>
                           </tr>
                       </thead>
                       <tbody></tbody>
                       <tfoot>
                        <tr>
                            <th>Bil</th>
                            <th>Nama</th>
                            <th>Pengguna</th>
                            <th>Kebenaran</th>
                            <th>Tindakan</th>  
                        </tr>
                       </tfoot>
                   </table>
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
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $(document).ready(function(){
        var table = $('#tblData').DataTable({
            reponsive:true, processing:true, serverSide:true, autoWidth:false, 
            ajax:"{{route('users.roles.index')}}", 
            columns:[
                {data:'DT_RowIndex', name:'id'},
                {data:'name', name:'name'},
                {data:'users_count', name:'users_count', className:"text-center"},
                {data:'permissions_count', name:'permissions_count', className:"text-center"},
                {data:'action', name:'action', bSortable:false, className:"text-center"},
            ], 
            //order:[[0, "desc"]], 
            bDestory:true,
        });
        $('body').on('click', '#btnDel', function(){
            //confirmation
            var id = $(this).data('id');
            if(confirm('Delete Data '+id+'?')==true)
            {
                var route = "{{route('users.roles.destroy', ':id')}}"; 
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

@section('footer')
<strong>Copyright &copy; 2023 <a href="https://jpnmelaka.moe.gov.my/">Sektor Pengurusan Maklumat Jabatan Pendidikan Negeri Melaka</a>.</strong>
    HakCipta Terpelihara.
    <div class="float-right d-none d-sm-inline-block">
    <b>Dibangunkan Oleh</b> Webmaster
    </div>
@stop