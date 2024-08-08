<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Tagihan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    
     


    public function index()
    {
        $transaksi = Transaksi::all();
        return view('page.transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::all();
        $tagihan = Tagihan::all();
        return view('page.transaksi.create', compact('siswa','tagihan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    
        try {
            // Create a new Transaksi instance with the request data
            $transaksi = new Transaksi($request->all());
    
            // Attach the logged-in user's ID
            $transaksi->user_id = Auth::id();

            $dateSlug = date('YmdHis'); // Date part of the slug
            $randomNumber = rand(1000, 9999); // Random number part of the slug
            $slug = $dateSlug . '-' . $randomNumber;
            $transaksi->invoince = $slug;
    
            // Save the Transaksi to the database
            $transaksi->save();
    
            // Flash success message and redirect to the transaksi index page
            $request->session()->flash('success', 'Berhasil menambahkan.');
            return redirect()->route('transaksi.index')->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            // Flash error messages and redirect back with input
            $request->session()->flash('error', 'Gagal menambahkan.');
            $request->session()->flash('error-details', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $transaksi = Transaksi::select('*')->findOrFail($id);
         return view('page.transaksi.invoice', [
             'transaksi' => $transaksi,
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
