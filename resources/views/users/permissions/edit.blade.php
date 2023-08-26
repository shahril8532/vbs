@extends('adminlte::page')

@section('title', 'Kemaskini Kebenaran | Dashboard')

@section('content_header')
    <h1>Kemaskini Kebenaran</h1>
@stop

@section('content')
   <div class="container-fluid">
    <div class="row">
        <div id="errorBox"></div>
        <div class="col-3">
            <form method="POST" action="{{route('users.permissions.update', $permission->id)}}">
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
                            <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Permission Name" value="{{$permission->name}}">
                            @if($errors->has('name'))
                                <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('users.permissions.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Kemaskini</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
   </div>
@stop