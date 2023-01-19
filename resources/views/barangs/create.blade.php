@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New barang</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('barangs.index') }}"> Back</a>
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
    <form action="{{ route('barangs.store') }}" method="POST">
        @csrf

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Barang:</strong>
                <textarea class="form-control" style="height:40px" name="nama_barangs" placeholder="Nama_Barang"></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Merek:</strong>
                <select name="nama_mereks" id="" class="form-control">
                    <option value=""> --Pilih Merek-- </option>
                    @foreach ($mereks as $id)
                        <Option value="{{ $id->nama_mereks }}"> {{ $id->nama_mereks }}</Option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Distributor:</strong>
                <select name="nama_distributors" id="" class="form-control">
                    <option value=""> --Pilih Distributor-- </option>
                    @foreach ($distributors as $id)
                        <Option value="{{ $id->nama_distributors }}"> {{ $id->nama_distributors }}</Option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga Barang:</strong>
                <input type="number" pattern=\d* class="form-control" name="harga_barangs" maxlength="10000" placeholder="Harga Barang">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga Beli:</strong>
                <input type="number" pattern=\d* class="form-control" name="harga_belis" maxlength="10000" placeholder="Harga Beli">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Stok:</strong>
                <input type="number" pattern=\d* class="form-control" name="stoks" maxlength="10000" placeholder="Stok">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Masuk:</strong>
                <input type="date" name="tgl_masuks" class="form-control" placeholder="Tanggal beli"
                    value="{{ date('Y-m-d') }}">
            </div>
        </div>

        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Petugas:</strong>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form">
                        <strong>Petugas:</strong>
                        <input type="text" name="nama_petugas" class="form-control" placeholder=""
                            value="{{ auth()->user()->name }} ">
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </div>
    </form>
@endsection
