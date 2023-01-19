<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Distributor;
use App\Models\Merek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::latest()->paginate(5);
        return view('barangs.index',compact('barangs'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mereks = Merek::all();
        $distributors = Distributor::all();
        return view('barangs.create', compact('mereks', 'distributors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barangs' => 'required',
            'nama_mereks' => 'required',
            'nama_distributors' => 'required',
            'harga_barangs' => 'required',
            'harga_belis' => 'required',
            'stoks' => 'required',
            'tgl_masuks' => 'required'
            
        ]);
        Barang::create([
            'nama_barangs' => $request-> nama_barangs,
            'nama_mereks' => $request-> nama_mereks,
            'nama_distributors' => $request-> nama_distributors,
            'harga_barangs' => $request-> harga_barangs,
            'harga_belis' => $request-> harga_belis,
            'stoks' => $request-> stoks,
            'tgl_masuks' => $request-> tgl_masuks,
            'nama_petugass' => Auth::user()->name
        ]);
        return redirect()->route('barangs.index')
        ->with('success', 'barangs created successfully');
        dd(request()->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        return view('barangs.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        $mereks = Merek::all();
        $distributors = Distributor::all();
        return view('barangs.edit', compact('barang', 'mereks', 'distributors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barangs' => 'required',
            'nama_mereks' => 'required',
            'nama_distributors' => 'required',
            'harga_barangs' => 'required',
            'harga_belis' => 'required',
            'stoks' => 'required',
            'tgl_masuks' => 'required',
            // 'nama_petugass' => 'required'       
         ]);

         
        // $barang->update($request->all());
        $barang->update([
            'nama_barangs' => $request-> nama_barangs,
            'nama_mereks' => $request-> nama_mereks,
            'nama_distributors' => $request-> nama_distributors,
            'harga_barangs' => $request-> harga_barangs,
            'harga_belis' => $request-> harga_belis,
            'stoks' => $request-> stoks,
            'tgl_masuks' => $request-> tgl_masuks,
            'nama_petugass' => Auth::user()->name
        ]);
        return redirect()->route('barangs.index')
        ->with('success', 'barangs created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barangs.index')
        ->with('success','barangs deleted successfully');
    }
}
