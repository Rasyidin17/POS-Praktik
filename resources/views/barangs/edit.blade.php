@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Barang</h2>
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
    <form action="{{ route('barangs.update', $barang->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Barang:</strong>
                    <input type="text" name="nama_barangs" value="{{ $barang->nama_barangs }}" class="form-control"
                        placeholder="Nama Barang">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Merek:</strong>
                    <select name="nama_mereks" id="" class="form-control">
                        <option value="{{ $barang->merek }}"> {{ $barang->merek }} </option>
                        @foreach ($mereks as $id)
                            <Option value="{{ $id->nama_mereks }}" @if ($barang->nama_merek == $id->nama_merek) selected @endif>
                                {{ $id->nama_mereks }}</Option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Distributor:</strong>
                    <select name="nama_distributors" id="" class="form-control">
                        <option value="{{ $barang->distributor }}"> {{ $barang->distributor }} </option>
                        @foreach ($distributors as $id)
                            <Option value="{{ $id->nama_distributors }}" @if ($barang->nama_distributor == $id->nama_distributor) selected @endif>
                                {{ $id->nama_distributors }}</Option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Harga Barang:</strong>
                    <input type="number" pattern="\d*" name="harga_barangs" value="{{ $barang->harga_barangs }}" class="form-control"
                        placeholder="Harga Barang">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Harga Beli:</strong>
                    <input type="number" pattern="\d*"  name="harga_belis" value="{{ $barang->harga_belis }}" class="form-control"
                        placeholder="Harga Beli">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Stok:</strong>
                    <input type="number" pattern="\d*" name="stoks" value="{{ $barang->stoks }}" class="form-control" placeholder="Stok">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Masuk:</strong>
                    <input type="text" name="tgl_masuks" value="{{ $barang->tgl_masuks }}" class="form-control"
                        placeholder="Tanggal Masuk">
                </div>
            </div>

            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Petugas:</strong>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form">
                            <strong>Petugas:</strong>
                            <input type="text" name="nama_petugas" class="form-control" placeholder="" disabled
                                value="{{ auth()->user()->name }} ">
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>



            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </div>
    </form>
@endsection
