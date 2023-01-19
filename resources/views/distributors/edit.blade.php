@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Distributor</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('distributors.index') }}"> Back</a>
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
    <form action="{{ route('distributors.update', $distributor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="nama_distributors" value="{{ $distributor->nama_distributors }}" class="form-control"
                        placeholder="Nama Distributor">
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Alamat:</strong>
                        <input type="text" name="alamat" value="{{ $distributor->alamat }}" class="form-control"
                            placeholder="Alamat">
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>No Telephone:</strong>
                            <input type="text" pattern=\d* class="form-control" name="no_tlp" maxlength="13" placeholder="No_Tlp" value="{{ $distributor->no_tlp }}" >  

                        </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
    </form>
@endsection
