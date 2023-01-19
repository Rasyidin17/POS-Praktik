@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit petugas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('petugass.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                
            </ul>
        </div>
    @endif
    <form action="{{ route('petugass.update', $petugas->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama petugas:</strong>
                    <textarea class="form-control" style="height:150px" name="nama" placeholder="Nama">{{ $petugas->nama }}</textarea>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Username:</strong>
                            <textarea class="form-control" style="height:150px" name="username" placeholder="Username">{{ $petugas->username }}</textarea>    
                    

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Password:</strong>
                                    <textarea class="form-control" style="height:150px" name="password" placeholder="Password">{{ $petugas->password }}</textarea>
        
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
    </form>
@endsection
