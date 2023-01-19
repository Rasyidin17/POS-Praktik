@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit transaksi</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('transaksis.index') }}"> Back</a>
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
    <form action="{{ route('transaksis.update', $transaksi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Barang:</strong>   
                    <select name="nama_barangs" id="barang" class="form-control" >
                    <option value="{{ $transaksi->barang }}"> {{ $transaksi->barang }} </option>
                    @foreach($barangs as $id)
                        <Option value="{{ $id->nama_barangs }}" @if ($transaksi->nama_barang == $id->nama_barang)
                            selected
                        @endif> {{$id->nama_barangs}}</Option>
                    @endforeach
                </select>
                </div>
            </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Harga Barang:</strong>   
                        <select name="harga_barangs" id="" class="form-control" >
                        <option value="{{ $transaksi->barang }}"> {{ $transaksi->barang }} </option>
                        @foreach($barangs as $id)
                            <Option value="{{ $id->harga_barangs }}" @if ($transaksi->harga_barang == $id->harga_barang)
                                selected
                            @endif> {{$id->harga_barangs}}</Option>
                        @endforeach
                    </select>
                    </div>
                </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Total Barang:</strong>
                            <input type="text" name="total_barangs" value="{{ $transaksi->total_barangs }}" class="form-control"
                            placeholder="Total Barang">
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Total Harga:</strong>
                                <input type="text" name="total_hargas" value="{{ $transaksi->total_hargas }}" class="form-control"
                                placeholder="Total Harga">
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Total Bayar:</strong>
                                    <input type="text" name="total_bayars" value="{{ $transaksi->total_bayars }}" class="form-control"
                                    placeholder="Total Bayar">
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Kembalian:</strong>
                                        <input type="text" name="kembalians" value="{{ $transaksi->kembalians }}" class="form-control"
                                        placeholder="Kembalian">
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Tanggal Beli:</strong>
                                            <input type="date" name="tanggal_belis" value="{{ $transaksi->tanggal_belis }}" class="form-control"
                                            placeholder="Tanggal beli">
                                        </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
    </form>

    <script>
        $(document).ready(function(){
            $('#barang').on("change", function(){
                let barangs = $(this).find('option:selected').attr('data-id');
                let harga = $('#harga_barang').val(barangs);
                console.log(harga);
            });

           
        });
    </script>
<script>
    $(document).ready(function(){
        $('#total_barangs').keyup(function () {
            var harga = $('#harga_barang').val();
            var jumlah = this.value;
            var total = parseInt(jumlah) * parseInt(harga);
            $('#total_harga').val(total);
            console.log(total);
        });
    
    });
</script>
@endsection
