<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tagihan = Tagihan::all();
        return view('page.tagihan.index', compact('tagihan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::all();
        return view('page.tagihan.create', compact('siswa'));
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
            // Create a new User instance with the request data
            $tagihan = new Tagihan($request->all());
    
            // Hash the password before saving
    
            // Save the user to the database
            $tagihan->save();
    
            // Flash success message and redirect to the user index page
            $request->session()->flash('success', 'Berhasil menambahkan.');
            return redirect()->route('tagihan.index')->with('success', 'Data berhasil disimpan.');
    
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
     * @param  \App\Models\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function show(Tagihan $tagihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $siswa = Siswa::all();
        $tagihansiswa = Tagihan::select('*')->findOrFail($id);
        
        return view('page.tagihan.edit', compact('tagihansiswa','siswa'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            // Find the existing Tagihan by ID
            $tagihan = Tagihan::findOrFail($id);
    
            // Update the Tagihan instance with the request data
            $tagihan->fill($request->all());
    
            // Save the updated Tagihan to the database
            $tagihan->save();
    
            // Flash success message and redirect to the tagihan index page
            $request->session()->flash('success', 'Berhasil memperbarui data.');
            return redirect()->route('tagihan.index')->with('success', 'Data berhasil diperbarui.');
            
        } catch (\Exception $e) {
            // Flash error messages and redirect back with input
            $request->session()->flash('error', 'Gagal memperbarui data.');
            $request->session()->flash('error-details', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // Find the Tagihan by ID
            $tagihan = Tagihan::findOrFail($id);
            
            // Delete the Tagihan
            $tagihan->delete();
            
            // Flash success message and redirect to the tagihan index page
            return redirect()->route('tagihan.index')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            // Flash error messages and redirect back
            return redirect()->route('tagihan.index')->with('error', 'Gagal menghapus data.');
        }
    }
    
}
