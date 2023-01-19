<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugass = Petugas::latest()->paginate(5);
        return view('petugass.index',compact('petugass'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugass.create');
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
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required'
            
        ]);
        Petugas::create($request->all());
        return redirect()->route('petugass.index')
        ->with('success', 'petugass created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show(Petugas $petugas)
    {
        return view('petugass.show', compact('petugas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Petugas $petugas)
    {
        return view('petugass.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Petugas $petugas)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required'       
         ]);
        $petugas->update($request->all());
        return redirect()->route('petugass.index')
        ->with('success', 'petugass created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petugas $petugas)
    {
        $petugas->delete();
        return redirect()->route('petugass.index')
        ->with('success','petugass deleted successfully');
    }
}
