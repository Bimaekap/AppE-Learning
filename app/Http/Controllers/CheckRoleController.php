<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CheckRoleController extends Controller
{
    public function checkRole(Request $request)
    {
        $data = $request->validate([
            'nisn' => 'required',
            'user_id' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required', 
        ]);
        if(auth()->user()->role === 'siswa'){
            Student::create($data);
            return redirect()->route('appSiswa');
        }else if(auth()->user()->role === 'guru'){
            Teacher::create($data);
            return redirect()->route('appGuru');
        }
    }
}
