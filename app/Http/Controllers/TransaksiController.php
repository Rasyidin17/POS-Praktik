<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Merek;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB as FacadesDB;
use Ramsey\Uuid\Type\Integer;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transaksi::latest()->paginate(5);
        return view('transaksis.index',compact('transaksis'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangs = Barang::all();
        return view('transaksis.create',  compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $find_barang = Barang::select('harga_barangs')->where('nama_barangs', $request->nama_barangs)->first();

        $get_stoks = Barang::select('stoks')->where('nama_barangs', $request->nama_barangs)->first();
        $total_harga = $request->total_barangs  * $find_barang->harga_barangs;
        $get_stoks;
        if ( $request->total_barangs  <= $get_stoks ) {
            if ($request->total_bayars < $total_harga) {
                return redirect()->back()->with('error', 'Uang tidak cukup!');
            }else{
                Transaksi::create([
                    'nama_barangs' => $request->nama_barangs,
                    'harga_barangs' => $find_barang->harga_barangs,
                    'total_barangs' => $request->total_barangs,
                    'total_hargas' => $request->total_barangs  * $find_barang->harga_barangs, 
                    'total_bayars' => $request ->total_bayars,
                    'kembalians' => $request ->total_bayars  - $request ->total_barangs  * $find_barang ->harga_barangs, 
                    'tanggal_belis' => Carbon::now(),
                    
                ]);
                Barang::where('nama_barangs', $request->nama_barangs)->decrement('stoks', $request->total_barangs);
                // FacadesDB::table('barangs')->where('nama_barangs', $find_barang->nama_barangs)->update(['stoks' => $find_barang->stoks - $request->total_barangs]);

                
    return redirect()->route('transaksis.index')
    
    ->with('success','Transaksi Berhasil Ditambahkan.');
            }
        }else{
            return redirect()->back()->with('error', 'stok tidak memadai!');
        }

}

        // $request->validate([
        //     'nama_barangs' => 'required',
        //     'harga_barangs' => 'required',
        //     'total_barangs' => 'required',
        //     'total_hargas' => 'required',
        //     'total_bayars' => 'required',
        //     'kembalians' => 'required',
        //     'tanggal_belis' => 'required'
            
        // ]);
        // $barang = Barang::find($request->id_barang);
        // if($barang->stoks < $request->total_barangs){
        //     return redirect()->back()->with('danger', 'barang tidak cukup');
        // }
// dd($request->nama_barangs);
        // Transaksi::create([
        //     'nama_barangs' => $request->nama_barangs,
        //     'harga_barangs' => $request->harga_barangs,
        //     'total_barangs' => $request->total_barangs,
        //     $total = 'total_hargas' => $request->harga_barangs * $request->total_barangs,
        //     'total_bayars' => $request->total_bayars,
        //     'kembalians' => $request->total_bayars -= $total,
        //     'tanggal_belis' => Carbon::now(),
        // ]);
        //     if ($request->total_bayars < $request->total_hargas) {
        //         return redirect()->back()->with('error', 'Uang tidak cukup!');
        //     }else {
        // $transaksi = new Transaksi;
        // $transaksi->nama_barangs = $request->nama_barangs;
        // $transaksi->harga_barangs = $request->harga_barangs;
        // $transaksi->total_barangs = $request->total_barangs;
        // $total = $transaksi->total_hargas = $request->harga_barangs * $request->total_barangs;
        // $transaksi->total_bayars = $request->total_bayars;
        // $transaksi->kembalians = $request->total_bayars - $total;
        // $transaksi->tanggal_belis = Carbon::now();
        // $transaksi->save();
        //     }
        // $transaksi = new Transaksi;
        // $transaksi->nama_barangs = $request->nama_barangs;
        // $transaksi->harga_barangs = $request->harga_barangs;
        // $transaksi->total_barangs = $request->total_barangs;
        // $total = $transaksi->total_hargas = $request->harga_barangs * $request->total_barangs;
        // $transaksi->total_bayars = $request->total_bayars;
        // $transaksi->kembalians = $request->total_bayars - $total;
        // $transaksi->tanggal_belis = Carbon::now();
        // $transaksi->save();

        // $barang->stoks -= $request->total_barangs;
        // $barang->save();

        // return redirect()->route('transaksis.index')
        // ->with('success', 'transaksis created successfully');
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        return view('transaksis.show', compact('transaksi'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        $barangs = Barang::all();
        $mereks = Merek::all();
        return view('transaksis.edit', compact('transaksi', 'barangs', 'mereks'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'nama_barangs' => 'required',
            'harga_barangs' => 'required',
            'total_barangs' => 'required',
            'total_hargas' => 'required',
            'total_bayars' => 'required',
            'kembalians' => 'required',
            'tanggal_belis' => 'required'       
         ]);
        $transaksi->update($request->all());
        return redirect()->route('transaksis.index')
        ->with('success', 'transaksis created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksis.index')
        ->with('success','transaksis deleted successfully');
    }

    // public function getHarga(Request $request)
    // {
    //     $hargas['nama_barangs'] = Barang::where('nama_barangs', $request->nama_barang)
    //                             ->first();

    //     return response()->json([
    //         'hargas' => $hargas,
    //     ]);
    // }
}
