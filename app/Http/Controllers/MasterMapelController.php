<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MasterMapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Lesson $lesson)
    {
        // $lesson_id = Lesson::findOrFail($id);
        $lessons = Lesson::with('teachers')->paginate(7);
        // $tentukanguru = Lesson::find($id);
        // dd($lessons);
        return view('content.admin.master-mapel',compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Lesson $id)
    {   
        $teachers = Teacher::all();
        $mapel = Lesson::all();
        $lessons = Lesson::with('teachers')->paginate(7);

        return view('popup.admin.master-mapel.tentukan-guru-lesson',compact('teachers','mapel','lessons'));
    }

    public function store(Request $request)
    {
      $request->validate([
            'nama_mapel' => 'required|unique:lessons,nama_mapel',
        ],
        [
            'nama_mapel.required' => 'nama mata pelajaran tidak boleh kosong'
        ]);
        Lesson::create([
            'nama_mapel' => $request->nama_mapel,
        ]);
        Alert::success('Berhasil','Tambah Nama Mapel Selesai');
        return redirect()->route('MasterMapel.create');
    }

    // Bagian Tentukan Mapel

    public function createTeacherToLesson($id)
    {
        $teachers = Teacher::all();
        $mapel = Lesson::all();
        $lesson = Lesson::find($id);
        return view('popup.admin.master-mapel.tentukan-guru-lesson',compact('teachers','mapel','lesson'));
  
    }
    public function storeTeacherToLesson( Request $request)
    {
        $lesson = new Teacher();
        $lesson->lessons = $request->input('teacher_id');
        $lesson->save();
        // $request->validate([
        //     'teacher_id' => 'required',
        // ]);
      
        // $lesson->update([
        //     'teacher_id' => 1,
        // ]);
        Alert::success('Berhasil', 'Menyimpan Data Guru Mapel');
        return redirect()->route('MasterMapel.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request,Lesson $id)
    {
        $data = $request->validate([
            'teacher_id' => 'required',
        ]);
        // dd($data);
        $lesson = Lesson::find($id);
        $lesson->update($request->teacher_id);
        Alert::success('Berhasil','Pilih Mapel Guru');
        return redirect()->route('MasterMapel.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lesson = Lesson::find($id);
        $lesson->delete();
        return redirect()->route('MasterMapel.index');
    }
}
