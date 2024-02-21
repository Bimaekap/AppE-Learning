<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            return view('content.guru.manajemen-ujian.manajemen-ujian');
        }
    }
    /**
     * Show the form for creating a new resource.
     */

     public function lihatSoalUjian()
     {
        return view('content.guru.manajemen-ujian.daftarsoal-ujian');

     }

     public function soalPilgan()
     {
        return view('content.guru.manajemen-ujian.tipe-soal.soal-pilihan-ganda');

     }

     public function soalEssay()
     {
        return view('content.guru.manajemen-ujian.tipe-soal.soal-essay');

     }

     public function uploadSoalPilgan()
     {
        return view('popup.guru.manajemen-bank-soal.upload-soal-pilgan');

     }

     public function uploadSoalEssay()
     {
        return view('popup.guru.manajemen-bank-soal.upload-soal-essay');

     }

     
   
     public function createSoalPilgan()
     {
        return view('popup.guru.manajemen-bank-soal.tambah-soal-pilgan');
     }

     public function createSoalEssay()
     {
        return view('popup.guru.manajemen-bank-soal.tambah-soal-essay');

     }
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
