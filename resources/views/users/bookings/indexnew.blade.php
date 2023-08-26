@extends('adminlte::page')

@section('title', 'Tempahan Kenderaan')

@section('content_header')
    <h1>Tempahan Baru</h1>
@stop

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2></h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.bookings.create') }}"> Tambah Tempahan</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
 
<table class="table table-bordered">
    <tr>
        <th>Bil</th>
        <th>Dokumen</th>
        <th>Nama</th>
        <th>Details</th>
        <th>Tarikh</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($bookings as $booking)
    <tr>
        <td>{{ ++$i }}</td>
        <td><img src="/images/{{ $booking->image }}" width="100px"></td>
        <td>{{ $booking->name }}</td>
        <td>{{ $booking->detail }}</td>
        <td>{{ $booking->date }}</td>
        <td>
            <form action="{{ route('users.bookings.destroy',$booking->id) }}" method="POST">
 
                <a class="btn btn-info" href="{{ route('users.bookings.show',$booking->id) }}">Papar</a>
  
                <a class="btn btn-primary" href="{{ route('users.bookings.edit',$booking->id) }}">Edit</a>
 
                @csrf
                @method('DELETE')
    
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $bookings->links() !!}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop