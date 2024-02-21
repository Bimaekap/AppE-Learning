<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Lesson;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
        return view('content.admin.master-mapel');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //   $kelases = Kelas::all();
        return view('popup.admin.master-mapel.tambah-master-mapel');
    }

    // Show the form for creating a new teacherlesson

    // ! Bagian Tentukan Mapel Ada Dibawah

    public function createteacherlesson()
    {

        return view('popup.admin.data-pendidik.tentukan-mapel');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'nama_lessons' => 'required',
        ]);

        Lesson::create($data);
        return redirect()->route('lessons.index');
    }

    // Store new lessons for teacher

    public function storeteacherlesson(Request $request)
    {

        // $admin = Teacher::findOrFail(request('teacher_id'));
    $request->validate([
            'teacher_id' => 'required',
            'lesson_id' => 'required',
            'kelas_id' => 'required'
        ]);
    
    $dataToCheck = DB::table('lesson_teacher')
    ->where('teacher_id', $request->input('teacher_id'))
    ->where('lesson_id', $request->input('lesson_id'))
    ->where('kelas_id', $request->input('kelas_id'))
    ->exists();

    if (!$dataToCheck) {
    // Simpan atau perbarui data
    DB::insert('INSERT INTO lesson_teacher(teacher_id, lesson_id, kelas_id) VALUES(?,?,?)',[
    $request['teacher_id'],
    $request['lesson_id'],
    $request['kelas_id'],
               // $admin
                // ->lesson_teacher()
                // ->attach(['teacher_id'=> $request->teacher_id],
                // ['lesson_id' => $request->lesson_id]);
    ]);
    return redirect()->route('lessons.createteacherlesson');

        

    }
    
    }
    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        //
        return view('popup.admin.master-mapel.tambah-master-mapel', compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->back();
    }
}
