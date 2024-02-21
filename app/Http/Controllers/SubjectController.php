<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SubjectController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $data_kelas = $user->teacher()->with('kelas')->get();
        // $subjects = $user->teacher()->with('lesson');
        $teacherId = $user->teacher()->get('id');
        $kelas = $user->kelas;
        $teacherId = Teacher::where('user_id',auth()->user()->id)->first()->id;

        // get data table subjects
        Kelas::find($teacherId);
        $dataTableSubjects = Subject::where('teacher_id',$teacherId)->get();
        // Ambil id subject dari edit-materi-after
        $id = Subject::all('id');
        $getIdSubject = Subject::find($id);

        // dd($dataTableSubjects);
        // dd($dataKelas);
        return view('content.guru.manajemen-materi.manajemen-materi', compact('getIdSubject','data_kelas','dataTableSubjects','kelas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $user = Auth::user();
        $lesson = $user->lessons;;
        return view('popup.guru.manajemen-materi.tambah-materi',compact('lesson' ,'data_kelas'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $file= $request->nama_file;
        $file_name = $file->getClientOriginalName();
        if($request->has('nama_file')){
            Storage::disk('local')->put('public/materi/'.$file_name,file_get_contents($file));
            $subjects = new Subject();
            $subjects->lesson_id = $request->lesson_id;
            $subjects->nama_materi = $request->nama_materi;
            $subjects->nama_kelas_get = $request->nama_kelas;
            $nama_mapel = Lesson::where('id',$request->lesson_id)->first()->nama_mapel;
            $subjects->nama_mapel_get = $nama_mapel;    
            $subjects->nama_file = $file_name;
            $subjects->kelas_id = $request->kelas_id;
            $subjects->teacher_id = Teacher::where('user_id', auth()->user()->id)->first()->id;
            $subjects->nama_guru = Teacher::where('user_id', auth()->user()->id)->first()->nama;
        }
            $subjects->save();
            Alert::success('Berhasil', 'menambah materi');
            return redirect()->route('subjects.index');
        }

    public function getFile(Request $request, $id)
    {
        // Ambil Id dari getFile
        $fileId = $request->id;
        $file_name = Subject::select('nama_file')->where('id', $fileId)->first()->nama_file;
        
        // $fileUrl = Storage::disk('local')->get('app/public/materi/'.$file_name);
   
        return Storage::download("public/materi/" . $file_name);
   
        // return response()->download($fileUrl);
    }
      
    

    /**
     * Display the specified resource.
     */
    public function show(string $teacherId)
    {
        // ! Perbaiki ini 

        $datanya = Subject::all();
        $teacherId = Teacher::where('user_id',auth()->user()->id)->first()->id;
        $dataKelas = Kelas::find($teacherId)->with('lesson')->get();
        $dataTableSubjects = Subject::where('teacher_id',$teacherId)->get();
        return view('popup.guru.manajemen-materi.data-kelas-guru',compact('dataKelas','datanya','dataTableSubjects'));
    }
    
    public function showDataKelasGuru()
    {
        $user = Auth::user();
        $datanya = Subject::all();
        $teacherId = Teacher::where('user_id',auth()->user()->id)->first()->id;

        $dataTableSubjects = Subject::where('teacher_id',$teacherId)->get();
        $teacherId = Teacher::where('user_id',auth()->user()->id)->first()->id;
        $dataKelas = Kelas::where('teacher_id',$teacherId)->with('lessons')->get();
        foreach($dataKelas as $get){
            foreach($get->lessons as $a ){
                $kelasId = $a->pivot->kelas_id;
            }
        }
        
        // dd($dataKelas);
        // dd($teacherId);
        // $teachers = $user->teacher()->with(['kelas','lesson'])->get();
        // dd($dataKelas);
        return view('popup.guru.manajemen-materi.data-kelas-guru',compact('dataTableSubjects','dataKelas','datanya'));
    }

    // Index Tambah Materi
    public function popUpIndex()
    {

        $user = Auth::user();
        $data_kelas = $user->teacher()->with('kelas','lesson')->get();
        $datanya = Subject::all();
        $dataTableSubjects = Subject::where('teacher_id',$teacherId)->get();

        $teacher = $user->teacher()->get();
        $teacherId = Teacher::where('user_id',auth()->user()->id)->first()->id;
        $dataKelas = Kelas::where('teacher_id',$teacherId)->with('lessons')->get();
      return view('popup.guru.manajemen-materi.tambah-materi',compact('teacher','data_kelas','dataKelas','datanya','dataTableSubjects'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        Kelas::find($id);
        $user = Auth::user();
        $datanya = Subject::all();
        $teacherId = Teacher::where('user_id',auth()->user()->id)->first()->id;
        $kelas = Kelas::find($id);
        $teacherId = Teacher::where('user_id',auth()->user()->id)->first()->id;
        $dataTableSubjects = Subject::where('teacher_id',$teacherId)->get();
        $dataKelas = Kelas::where('teacher_id',$teacherId)->with('lessons')->get();
        
        return view('popup.guru.manajemen-materi.edit-materi',compact('dataTableSubjects','kelas','dataKelas','datanya'));

    }

    public function editAfter(Subject $id)
    {
        $teacherId = Teacher::where('user_id',auth()->user()->id)->first()->id;
        $dataTableSubjects = Subject::where('teacher_id',$teacherId)->get();
        // $subject = Subject::find($id)->get();
        // dd($subject);
        // dd($getIdSubject);
        return view('popup.guru.manajemen-materi.edit-materi-after',compact('dataTableSubjects','id'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {   
        $subjects = Subject::find($id);
        $file= $request->nama_file;
        $file_name = $file->getClientOriginalName();

        if($request->has('nama_file')){
            Storage::disk('local')->put('public/materi/'.$file_name,file_get_contents($file));
            // $nama_mapel = Lesson::where('id',$request->lesson_id)->first()->nama_mapel;
            $subjects->nama_kelas_get = $request->nama_kelas_get;
        
            $subjects->nama_mapel_get = $request->nama_mapel_get;
            $subjects->lesson_id = $request->lesson_id;
            $subjects->nama_materi = $request->nama_materi;
            $subjects->nama_file = $file_name;
            }
        $subjects->update();
        return redirect()->route('subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subjects = Subject::find($id);
        $subjects->delete();
        Alert::success('Berhasil Hapus Materi');
        return redirect()->back();
    }
}
