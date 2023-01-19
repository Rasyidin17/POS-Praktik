@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Distributor</h2>
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
    <form action="{{ route('distributors.store') }}" method="POST">
        @csrf
        
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Distributor:</strong>
                    <textarea class="form-control" style="height:150px" name="nama_distributors" placeholder="Nama_Distributor"></textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alamat:</strong>
                    <textarea class="form-control" style="height:150px" name="alamat" placeholder="Alamat"></textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nomor Telephone:</strong>
                    <input type="text" pattern=\d* class="form-control" name="no_tlp" maxlength="13" placeholder="No_Tlp" >  
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
