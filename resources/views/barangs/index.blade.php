@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Point Of Sale</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('barangs.create') }}"> Create New barangs</a>
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
            <th>Nama Merek</th>
            <th>Nama Distributor</th>
            <th>Harga Barang </th>
            <th>Harga Beli</th>
            <th>Stok</th>
            <th>Tanggal Masuk</th>
            <th>Nama Petugas</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($barangs as $barang)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $barang->nama_barangs }}</td>
                <td>{{ $barang->nama_mereks }}</td>
                <td>{{ $barang->nama_distributors }}</td>
                <td>{{ $barang->harga_barangs }}</td>
                <td>{{ $barang->harga_belis }}</td>
                <td>{{ $barang->stoks }}</td>
                <td>{{ $barang->tgl_masuks }}</td>
                <td>{{ $barang->nama_petugass }}</td>

                
                <td>
                    <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('barangs.show', $barang->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('barangs.edit', $barang->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin mau hapus {{ $barang->nama_barangs }}?')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $barangs->links() !!}
@endsection
