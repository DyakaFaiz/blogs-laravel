<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{

    public function index()
    {
        return view('registrasi.index', [
            "title" => "Registrasi"
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required | min:4 | max:255',
            'username' => 'required|unique:users|min:3|max:25',
            'email' => 'required | email:dns | unique:users',
            'password' => 'required | min:4 | max:255'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect('/login')->with('success', 'Berhasil registrasi!!, Silahkan login');
    }
}
