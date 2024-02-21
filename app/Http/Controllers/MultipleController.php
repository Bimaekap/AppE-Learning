<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Mockery\Undefined;
use App\Models\Multiple;
use Illuminate\Http\Request;
use App\Exports\MultipleExport;
use App\Imports\MultiplesImport;
use App\Models\Lesson;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;
class MultipleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $teachers = $user->teachers;
        $multiples = Multiple::all();
        return view('popup.guru.manajemen-bank-soal.pilih-mapel',compact('teachers' ,'multiples'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
 
    // export contoh soal pilihan ganda
    public function export()
    {
        return Excel::download(new MultipleExport, 'contoh-soal-pilgan.xlsx');
    }

    public function import(Request $request)
    {
        
    
        // $file_name = time().'-' .$file_soal->getClientOriginalName();
        // dd($file_soal);
        Excel::import(new MultiplesImport,$request->file('multiples'));
        // dd($file_soal);
        return back();
    }
    /**
     * Store a newly created resource in storage.
     */

    //  ! pilih mapel 
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'lesson_id' => 'required',
            'kelas_id' => 'required',
            
        ]);

        DB::insert('INSERT INTO multiples(kelas_id,lesson_id) VALUES(?,?)', [
            $data['lesson_id'],
            $data['kelas_id'],
        ]);

        Excel::import(new MultiplesImport,$request->file('multiples'));

        return back();


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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
