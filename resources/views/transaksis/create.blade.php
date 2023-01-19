@extends('layouts.layout')
@section('content')
@if ($message = Session::get('error'))
<div class="alert alert-danger">
    <p>{{ $message }}</p>
</div>
@endif
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Transaksi</h2>
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
    <form action="{{ route('transaksis.store') }}" method="POST">
        @csrf
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Barang:</strong>   
                <select name="nama_barangs" id="barang" class="form-control" >
                    <option value=""> --Pilih Barang-- </option>
                    @foreach($barangs as $id)
                        <option data-id="{{ $id->harga_barangs }}" value="{{ $id->nama_barangs }}"> {{$id->nama_barangs}} : {{ $id->stoks }} </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga Barang:</strong>   
                {{-- <div id="harga"> --}}
                    <input type="text" name="harga_barangs" disabled id="harga_barang" class="form-control" placeholder="Total Barang">
                {{-- </div> --}}
            </select>
            </div>
        </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Total Barang:</strong>
                        <input type="text " pattern="\d*" maxlength="1000" name="total_barangs" id="total_barangs" class="form-control" placeholder="Total Barang">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Total Harga:</strong>
                        <input type="text" disabled name="total_hargas" id="total_harga"  class="form-control"
                        placeholder="Total Harga">
                    </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Total Bayar:</strong>
                        <input type="text" name="total_bayars" class="form-control"
                        placeholder="Total Bayar">
                    </div>
                </div>

                {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Kembalian:</strong>
                        <input type="text" name="kembalians"  class="form-control"
                        placeholder="Kembalian">
                    </div>
                </div> --}}

                                {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Tanggal Beli:</strong>
                                        <input type="date" name="tanggal_belis" class="form-control"
                                        placeholder="Tanggal beli" value="{{ date('Y-m-d') }}">
                                    </div> --}}

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
{{-- <script type="text/javascript">
    $(document).ready(function() {
        $('#nama_barangs').on('change', function() {
            var namaBarang = $(this).val();
            $.ajax({
                type: 'GET',
                url: '{{ route('getHarga') }}?nama_barangs=' + namaBarang,
                dataType: 'json',
                success: function (response) {
                    $.each(response.hargas, function (key, item) {
                        // console.log(response.hargas);
                        $('#harga').empty();
                        $('#harga').append('<input class="form-control" id="harga_barangs" name="harga_barangs" value="'+ item.harga_barangs +'" style="cursor: not-allowed;">')
                    });
                }
            });
        })
    });
</script> --}}
@endsection
