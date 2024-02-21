<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Lesson;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\Console\Input\Input;

class MasterKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $MasterKela = Kelas::findOrFail($id);

        $kelas =  Kelas::with('teachers', 'lessons')->paginate(7);
        // dd($kelas);
        return view('content.admin.master-kelas', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::with('teacher', 'lesson')->get();
        $teachers = Teacher::all();
        $teacher = Teacher::all();

        $mapels = Lesson::all();
        // dd($teachers); 
        return view('popup.admin.master-kelas.tambah-master-kelas-step-satu', compact('kelas', 'teachers', 'teacher', 'mapels', 'teacher'));
    }

    public function createToKelasLesson()
    {
        $teachers = Teacher::with('kelas')->get();
        $mapels = Lesson::all();
        $teacher = Teacher::all();
        return view('popup.admin.master-kelas.tambah-master-kelas-step-dua', compact('teachers', 'teacher', 'mapels', 'kelas'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ! TAMBAH MASTER SISWA STEP SATU
        $data_one = $request->validate([
            'kode_kelas' => 'required',
            'nama_kelas' => 'required',
            'teacher_id' => 'required',
            'lesson_id' => 'required',
        ]);

        $kelasId = DB::table('kelas')->insertGetId($data_one);
        $lessonId = DB::table('kelas')->where('lesson_id', '=', $request->lesson_id)->first()->lesson_id;
        $teacherId = DB::table('kelas')->where('teacher_id', '=', $request->teacher_id)->first()->teacher_id;
        DB::insert('INSERT INTO kelas_lesson(kelas_id,lesson_id) VALUES(?,?)', [
            $kelasId,
            $lessonId,
        ]);

        DB::insert('INSERT INTO kelas_teacher(kelas_id,teacher_id) VALUES(?,?)', [
            $kelasId,
            $teacherId,
        ]);
        // DB::commit();
        // $data_two 

        Alert::success('Sukses', 'Berhasil Tambah Data Kelas');

        return redirect()->route('MasterKelas.index');
    }


    public function storeTokelasLesson(Request $request)
    {
        $lesson = new Lesson();
        $lesson->kelases()->attach(
            ['kelas_id' => $request->kelas_id],
            ['lesson_id' => $request->lesson_id],
        );

        //   $request->validate([
        //         'kelas_id' => 'required',
        //         'lesson_id' => 'required',
        //     ]);
        //     DB::insert('INSERT INTO kelas_lesson(kelas_id,lesson_id) VALUES(?,?)',[
        //         $request->kelas_id,
        //         $request->lesson_id,
        //     ]);
        Alert::success('Sukses', 'Berhasil Tambah Data Kelas');

        return redirect()->route('MasterKelas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    public function showTambahSiswa($id)
    {
        $kelas = Kelas::with('teacher', 'lesson')->get();
        $teacher = Teacher::all();
        $kelasId = Kelas::find($id);
        $mapels = Lesson::all();
        $students = Student::all();
        return view('popup.admin.master-kelas.tambah-siswa', compact('students', 'teacher', 'kelas', 'mapels', 'kelasId'));
    }

    public function storeTambahSiswa(Request $request)
    {
        // dd($request->all());
        // $student = new Student();
        DB::insert('INSERT INTO kelas_student(kelas_id,student_id) VALUES(?,?)', [
            $request->kelas_id,
            $request->student_id,
        ]);
        // $student->kelases()->attach(['kelas_id' => 7],['student_id' => $request->student_id]);
        Alert::success('Sukses');
        return redirect()->route('MasterKelas.index');
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
    public function destroy($id)
    {

        $kelas = Kelas::find($id);
        $kelas->delete();
        return redirect()->route('MasterKelas.index');
    }
}
