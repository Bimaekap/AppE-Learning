<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Lesson;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = Auth::user();
        // $materi = $user->student()->with('kelases')->get();
        $teacherId = Teacher::where('user_id',auth()->user()->id)->first()->id;
        $jumlahMateri = Subject::where('teacher_id',$teacherId)->get();
        $jumlahKelas = Kelas::where('teacher_id',$teacherId)->get();
        $teachers =Kelas::where('teacher_id',$teacherId)->with('lessons')->get() ;
        $jumlahDataKelas = Kelas::all()->where('teacher_id',Auth::user()->id);
        // dd($teachers);
        return view('content.guru.dashboard-guru' ,compact('jumlahKelas','teachers','jumlahDataKelas','jumlahMateri'));
}

}
