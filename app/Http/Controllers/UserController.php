<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('page.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('page.user.create');
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
            $user = new User($request->all());
    
            // Hash the password before saving
            if ($request->has('password')) {
                $user->password = Hash::make($request->input('password'));
            }
    
            // Save the user to the database
            $user->save();
    
            // Flash success message and redirect to the user index page
            $request->session()->flash('success', 'Berhasil menambahkan.');
            return redirect()->route('user.index')->with('success', 'Data berhasil disimpan.');
    
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $user = User::select('*')->findOrFail($id);
         return view('page.user.view', [
             'user' => $user,
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::select('*')->findOrFail($id);
        
        return view('page.user.edit', [
            'user' => $user,
        ]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the updated data
        // Add your validation logic here, if needed

        try {
            // Find the user by ID
            $user = User::find($id);

            if (!$user) {
                return redirect()->route('user.index')->with('error', 'User tidak ditemukan.');
            }

            // Get all the input data except the password
            $input = $request->except('password');

            // Check if the password is present in the request and hash it
            if ($request->filled('password')) {
                // Mengambil kata sandi baru dari request
                $newPassword = $request->input('password');
                
                // Memeriksa apakah kata sandi baru cocok dengan kata sandi lama yang sudah di-hash
                if (!Hash::check($newPassword, $user->password)) {
                    // Meng-hash dan menyimpan kata sandi baru
                    $user->password = Hash::make($newPassword);
                }
            }
            
        
            // Update the user with the input data
            $user->update($input);

            // Flash success message and redirect to the user index page
            $request->session()->flash('success', 'Berhasil memperbarui.');
            return redirect()->route('user.index')->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui user. ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
