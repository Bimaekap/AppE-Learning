<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Lesson;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\teachers_lesson;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    //

    public function index()
    {
        $teachers = Teacher::all();
        $lessons= Lesson::all();
        $teacher_lesson = Teacher::with('lessons')->first();

        return view('popup.admin.data-pendidik.tentukan-mapel', compact('teachers','lessons', 'teacher_lesson'));
  
    }

    public function tentukanMapelGuru(Request $request)
    {

        $data = $request->validate([
            'teacher_id' => 'required',
            'lesson_id' => 'required',
        ]);

        // input ke database tanpa model
        DB::table('teacher_lesson')->insert($data);
        return redirect()->route('data-pendidik');
    }
}
