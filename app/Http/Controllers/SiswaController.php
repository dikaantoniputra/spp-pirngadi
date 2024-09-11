<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();
        return view('page.siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('page.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        // $request->validate(User::$rules);
    
        try {
            // Create a new User instance with the request data
            $user = new Siswa($request->all());
    
            // Hash the password before saving
            
    
            // Save the user to the database
            $user->save();
    
            // Flash success message and redirect to the user index page
            $request->session()->flash('success', 'Berhasil menambahkan.');
            return redirect()->route('siswa.index')->with('success', 'Data berhasil disimpan.');
    
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
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $user = Siswa::select('*')->findOrFail($id);
         return view('page.siswa.view', [
             'user' => $user,
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = Siswa::select('*')->findOrFail($id);
        
        return view('page.siswa.edit', [
            'user' => $user,
        ]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            // Find the Kategori instance by ID
            $siswa = Siswa::findOrFail($id);

            // Update the Kategori instance with the request data
            $siswa->fill($request->all());

            // Attach the logged-in user's ID (if needed for some reason)
            // Save the updated Kategori to the database
            $siswa->save();

            // Flash success message and redirect to the kategori index page
            $request->session()->flash('success', 'Berhasil memperbarui.');
            return redirect()->route('siswa.index')->with('success', 'Data berhasil diperbarui.');

        } catch (\Exception $e) {
            // Flash error messages and redirect back with input
            $request->session()->flash('error', 'Gagal memperbarui.');
            $request->session()->flash('error-details', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        if ($siswa) {
            $siswa->delete();
            return redirect()->back()->withInput()->with('success', 'Kegiatan Berhasil Di Tambahkan.');
        } else {
            return redirect()->back()->withInput()->with('success', 'Kegiatan Berhasil Di Tambahkan.');
        }
    }
}
