<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{

    public function index()
    {
        return view('login.index', ["title" => "Login"]);
    }


    public function login(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    
        // Extract credentials from the request
        $credentials = $request->only('username', 'password');
    
        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Check if the user status is active (0)
            if (Auth::user()->status == '0') {
                // Redirect based on user role
                $role = Auth::user()->role;
                if ($role === 'admin') {
                    return redirect()->route('admin.dashboard');
                } elseif ($role === 'kepala-unit-sma') {
                    return redirect()->route('sma.admin.dashboard');
                } else {
                    return redirect()->route('user.dashboard');
                }
            } else {
                // If user is not active, log them out and show an error message
                Auth::logout();
                return redirect()->back()->withInput()->withErrors([
                    'error' => 'Akun Anda Tidak Aktif Harap Hubungi Admin.',
                ]);
            }
        }
    
        // If authentication fails, redirect back with an error message
        return redirect()->back()->withInput()->withErrors([
            'error' => 'Invalid credentials. Please try again.',
        ]);
    }
    



        public function logout()
        {
            Auth::logout();

            return redirect('/');
        }

        public function daftar(Request $request)
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


}
