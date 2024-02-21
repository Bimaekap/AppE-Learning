<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenBankSoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    public function manajemenBankSoalPilgan ()
    {
       return view('content.guru.manajemen-bank-soal.manajemen-bank-soal-pilgan');
    }

    public function manajemenBankSoalEssay ()
    {
       return view('content.guru.manajemen-bank-soal.manajemen-bank-soal-essay');
    }

    public function createBankSoalPilgan()
    {
        return view('popup.guru.manajemen-bank-soal.tambah-soal-pilgan');
    }

    public function createBankSoalEssay()
    {
        return view('popup.guru.manajemen-bank-soal.tambah-soal-essay');
    }

    public function uploadBankSoalPilgan()
    {
        return view('popup.guru.manajemen-bank-soal.upload-soal-pilgan');
    }

    public function uploadBankSoalEssay()
    {
        return view('popup.guru.manajemen-bank-soal.upload-soal-essay');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
