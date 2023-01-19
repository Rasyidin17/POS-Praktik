@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>POS</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('transaksis.create') }}"> Create New transaksis</a>
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
            <th>No</th>
            <th>Nama Barang</th>
            <th>Harag Barang</th>
            <th>Total Barang</th>
            <th>Total Harga</th>
            <th>Total Bayar</th>
            <th>Kembalian</th>
            <th>Tanggal Beli</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($transaksis as $transaksi)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $transaksi->nama_barangs }}</td>
                <td>{{ $transaksi->harga_barangs }}</td>
                <td>{{ $transaksi->total_barangs }}</td>
                <td>{{ $transaksi->total_hargas }}</td>
                <td>{{ $transaksi->total_bayars }}</td>
                <td>{{ $transaksi->kembalians }}</td>
                <td>{{ $transaksi->tanggal_belis }}</td>

                <td>
                    <form action="{{ route('transaksis.destroy', $transaksi->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('transaksis.show', $transaksi->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('transaksis.edit', $transaksi->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin mau hapus {{ $transaksi->nama_barangs }}?')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $transaksis->links() !!}
@endsection
