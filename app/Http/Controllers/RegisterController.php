<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    public function create(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|unique:users,nama',
            'password' => 'required',
            'role' => 'required',
        ],
        [
            'nama.unique' => 'nama yang anda pakai sudah digunakan'
        ]);

        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->route('login-index');
    }

    public function createAndCheckRoles()
    {
    
    }
}
