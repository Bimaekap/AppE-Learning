<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{

    public function indexAdmin()
    {
    
        return view('app-admin');
    }

    public function dashboard()
    {
        $users = User::all();
        $students  = Student::all();
        foreach($students as $student){
            if($student->jenis_kelamin === 'perempuan'){
                $dataPerempuan = $student->id;
            }else{
                $dataPria = $student->id;
            }
        }

        $teacher = Teacher::all()->count();
        $perempuan = $dataPerempuan;
        $pria = $dataPria;
        return view('content.admin.dashboard-admin',compact('users','pria','perempuan','teacher'));
    }

    public function indexSiswa()
    {
    
        return view('app-siswa');
    }

    public function settingProfileAdmin()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        // dd($user);
        // dd($whoIsUser);
        return view('content.admin.profile-admin',compact('user'));
    }

    public function settingProfileGuru()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        // dd($whoIsUser);
        return view('content.guru.profile-guru',compact('user'));
    }

    public function settingProfileSiswa()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        dd($user);
        // dd($whoIsUser);
        return view('content.admin.profile-siswa',compact('user'));
    }



    public function storeProfile(Request $request)
    {
        $id = Auth()->user()->id;
        $user = User::find($id);
        // dd($request->all());
        $file = $request->foto_profil;
        $nama_foto = $file->getClientOriginalName();
        // dd($nama_foto);
        if($request->has('foto_profil')){
            Storage::disk('local')->put('public/profiles/'.$nama_foto,file_get_contents($file));
            $user->nama = $request->nama;
            $user->foto = $nama_foto;
            $user->save();
            return redirect()->back();
        }
    } 
    public function indexGuru($id)
    {
        $user = Auth::user();
        $materi = $user->student()->with('kelases')->get();
        $userId = User::find($id);
        // dd($materi);
        return view('app-guru', compact('materi','userId'));    
    }
    public function confirmStatus()
    {
        return view('popup.confirm-status');
    }

    public function storeConfirmStatus(Request $request,$id)
    {
        // Jika guru login
        if(auth()->user()->role === 'guru'){
            $request->validate([
                'user_id' => 'required',
                'nama' => 'required',
                'nomor_induk' => 'required',
                'jabatan' => 'required',
                'alamat' => 'required',
                'jenis_kelamin' => 'required',
                'nomor_hp' => 'required',
            ],
        [
            'nomor_induk.required' => 'Tidak Boleh Kosong',
            'nama.required' => 'Tidak Boleh Kosong',
            'jabatan.required' => 'Tidak Boleh Kosong',
            'alamat.required' => 'Tidak Boleh Kosong',
            'jenis_kelamin.required' => 'belum pilih jenis kelamin',
            'nomor_hp.required' => 'Tidak Boleh Kosong',
        ]);
       Teacher::create([
            'user_id' => $request->user_id,
            'nomor_induk' => $request->nomor_induk,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nomor_hp' => $request->nomor_hp,
            
        ]);
        Alert::success('Berhasil','Selamat Mengajar');

        return redirect()->route('dashboard.guru');

        }
        
        // Jika siswa login
        if(auth()->user()->role === 'siswa'){
            $request->validate([
                'user_id' => 'required',
                'nama' => 'required',
                'nomor_induk' => 'required',
                'jabatan' => 'required',
                'alamat' => 'required',
                'jenis_kelamin' => 'required',
                'nomor_hp' => 'required',
            ],
        [
            'nomor_induk.required' => 'Tidak Boleh Kosong',
            'nama.required' => 'Tidak Boleh Kosong',
            'jabatan.required' => 'Tidak Boleh Kosong',
            'alamat.required' => 'Tidak Boleh Kosong',
            'jenis_kelamin.required' => 'belum pilih jenis kelamin',
            'nomor_hp.required' => 'Tidak Boleh Kosong',
        ]);
       Student::create([
            'user_id' => $request->user_id,
            'nomor_induk' => $request->nomor_induk,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nomor_hp' => $request->nomor_hp,
       ]);
       Alert::success('Berhasil','Selamat Belajar');
       return redirect()->route('home.siswa');

            }
    }


    // Register Hanya tersedia pada role admin
    public function registerAkun()
    {
        return view('content.admin.master-register');
    }

    public function registerCreate(RegisterRequest $request):RedirectResponse
    {
        $dataRegister = User::create($request);

        return redirect()->back();
    }
}
    