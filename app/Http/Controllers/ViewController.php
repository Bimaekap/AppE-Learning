<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\User;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ViewController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function materiSiswa()
    {
        $studentId = Student::where('user_id', auth()->user()->id)->first()->id;
        // $student = Student::find($studentId);
        $student = Student::where('id', $studentId)->with('kelases')->get();
        $siswa = Student::find($studentId);
        $xx = $siswa->kelases()->get();
        $array = $xx->map(function ($data) {
            return $data->id;
        })->all();

        $f = $array;
        $dataTableSubject = Subject::whereIn('kelas_id', $f)->get();

        return view('content.siswa.materi-siswa', compact('dataTableSubject'));
    }
    public function pilihanMateri(Subject $id)
    {

        $studentId = Student::where('user_id', auth()->user()->id)->first()->id;
        // $student = Student::find($studentId);
        $student = Student::where('id', $studentId)->with('kelases')->get();
        $siswa = Student::find($studentId);
        $xx = $siswa->kelases()->get();
        $array = $xx->map(function ($data) {
            return $data->id;
        })->all();

        $f = $array;
        // !

        $isHasTugas = Evaluation::where('student_id', $studentId)->where('subject_id', $id->id)->value('file_tugas');
        // dd($isHasTugas);
        $dataTableSubject = Subject::whereIn('kelas_id', $f)->get();
        $evaluation = Evaluation::all();
        // $getIdEvaluation = Evaluation::where('student_id', $studentId)->where('subject_id', $id->id)->first()->id;
        // dd($getIdEvaluation);
        return view('content.siswa.pilihan-materi', compact('dataTableSubject', 'id', 'evaluation', 'isHasTugas'));
    }

    public function storePilihanMateri(Request $request)
    {
        $file = $request->file_tugas;
        // dd($request->all());
        $file_name = $file->getClientOriginalName();
        if ($request->has('file_tugas')) {
            Storage::disk('local')->put('public/materi/' . $file_name, file_get_contents($file));
            $evaluations = new Evaluation();
            $evaluations->nama_tugas = $request->nama_tugas;
            $evaluations->kelas_id = $request->kelas_id;
            $evaluations->nama_mapel = $request->nama_mapel;
            $evaluations->file_tugas = $file_name;
            $evaluations->subject_id = $request->subject_id;
            $evaluations->nama_siswa = Student::where('user_id', auth()->user()->id)->first()->nama;
            $evaluations->student_id = Student::where('user_id', auth()->user()->id)->first()->id;
        }
        $evaluations->save();
        Alert::success('Berhasil', 'Tugas Sudah Dikumpul');
        return redirect()->back();
    }

    public function getFileTugas($id)
    {
        // Ambil Id dari getFile
        //    dd($subjectId
        // $isHasTugas
        // dd($id);
        // dd($ide);
        $studentId = Student::where('user_id', auth()->user()->id)->first()->id;
        // $idEval = Evaluation::where('subject_id',$id)->first()->id;
        // dd($idEval);
        $isHasTugas = Evaluation::where('subject_id', $id)->value('file_tugas');
        if ($isHasTugas === null) {
            Alert::warning('Tugas Masing Kosong');
            return redirect()->back();
            // dd($isHasTugas);
        } else {
            $file_name = Evaluation::select('file_tugas')->where('subject_id', $id)->first()->file_tugas;
            return Storage::download("public/materi/" . $file_name);
        }
        // dd($file_name);
        // $fileUrl = Storage::disk('local')->get('app/public/materi/'.$file_name);

        // return response()->download($fileUrl);
    }

    public function deleteTugas($id)
    {
        $idEval = Evaluation::where('subject_id', $id)->first()->id;
        $findEvalId = Evaluation::find($idEval);

        // dd($idEval);
        // $studentId = Student::where('user_id',auth()->user()->id)->first()->id;

        // $getIdEvaluation = Evaluation::where('student_id', $studentId)->where('subject_id', $idEval)->first()->file_tugas;
        // $studentId = Student::where('user_id',auth()->user()->id)->first()->id;
        // $isHasTugas = Evaluation::where('student_id', $studentId)->where('subject_id', $id->id)->value('file_tugas');
        // dd($getIdEvaluation);
        $findEvalId->delete();
        Alert::success('Berhasil', 'data tugas dihapus');
        return redirect()->back();
    }

    public function ok()

    {
        dd('ok');
    }
}
