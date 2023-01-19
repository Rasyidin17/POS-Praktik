@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Point of Sale</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('petugass.create') }}"> Create New petugas</a>
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
            <th>Nama petugas</th>
            <th>Username</th>
            <th>Password</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($petugass as $petugas)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $petugas->nama }}</td>
                <td>{{ $petugas->username }}</td>
                <td>{{ $petugas->password }}</td>
                <td>
                    <form action="{{ route('petugass.destroy', $petugas->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('petugass.show', $petugas->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('petugass.edit', $petugas->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin mau hapus {{ $petugas->nama_petugass }}?')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $petugass->links() !!}
@endsection
