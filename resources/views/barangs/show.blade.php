@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Merek</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('distributors.index') }}"> Back</a>
            </div>
        </div>
    </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Barang</strong>
                {{ $barang->nama_barangs }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Merek</strong>
                {{ $barang->nama_mereks }}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Namam Distributor</strong>
                {{ $barang->nama_distributors }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga Barang</strong>
                {{ $barang->harga_barangs }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga Beli</strong>
                {{ $barang->harga_belis }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Stok</strong>
                {{ $barang->stoks }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Masuk</strong>
                {{ $barang->tgl_masuks }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Namam Petugas</strong>
                {{ $barang->nama_petugass }}
            </div>
        </div>

    </div>
@endsection
