<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Evaluation;
use App\Models\Kelas;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPSTORM_META\map;

class manajemenTugasController extends Controller
{
    //
    public function halMateriTugas()
    {
        $x = DB::table('kelas_teacher')->where('teacher_id', Teacher::where('user_id', auth()->user()->id)->first()->id)->get();
        $data = $x->map(function ($s) {
            return $s->id;
        })->all();
        $getKelasId = Evaluation::all('kelas_id');

        // dd($data)
        // dd($x);
        $g = $getKelasId->map(function ($y) {
            return $y->kelas_id;
        })->all();
        $getEvaluation = Evaluation::with('kelas')->whereIn('kelas_id', $data)->get();
        // dd($getEvaluation);
        $kelasId = Kelas::whereIn('id', $g)->get();
        // dd($kelasId);
        // $evaluation = Evaluation::find($id);

        return view('content.guru.manajemen-tugas.manajemen-tugas', compact('getEvaluation', 'kelasId'));
    }

    public function penilaianTugas($id)
    {
        $evaluation = Evaluation::findOrFail($id);
        $x = DB::table('kelas_teacher')->where('teacher_id', Teacher::where('user_id', auth()->user()->id)->first()->id)->get();
        $data = $x->map(function ($s) {
            return $s->id;
        })->all();
        // dd($data);
        // ambil nama siswa dari student id

        // $namaSiswa = Student::where('user_id',)
        // ambil kelas id

        // dd($data)    
        // dd($x);

        $getEvaluation = Evaluation::with('kelas')->whereIn('kelas_id', $data)->get();
        $getKelasId = Evaluation::all('kelas_id');
        $g = $getKelasId->map(function ($y) {
            return $y->kelas_id;
        })->all();

        // dd($g);
        $kelasId = Kelas::whereIn('id', $g)->get();

        // dd($kelasId);
        // $getNamaKelas = Kelas::where('id', $data)->first()->nama_kelas;
        // dd($getEvaluation);
        return view('popup.guru.manajemen-tugas.tambah-nilai', compact('getEvaluation', 'id', 'kelasId', 'evaluation'));
    }

    public function getHasilTugas(Request $request)
    {

        $fileId = $request->id;
        $file_name = Evaluation::select('file_tugas')->where('id', $fileId)->first()->file_tugas;
        // dd($file_name);
        return Storage::download("public/materi/" . $file_name);
    }

    public function penilaian(Request $request, $id)
    {
        $evaluations = Evaluation::find($id);
        $evaluations->nilai = $request->input('nilai');
        $evaluations->update();

        // dd($request);
        Alert::success('Berhasil', 'Tugas Sudah Dinilai');
        return redirect()->route('manajemen-tugas');
    }

    public function destroy(string $id)
    {
        $evaluations = Evaluation::find($id);
        $evaluations->delete();
        Alert::success('Berhasil Hapus Tugas');
        return redirect()->back();
    }
}
