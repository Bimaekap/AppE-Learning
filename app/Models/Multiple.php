<?php

namespace App\Models;

use App\Imports\MultiplesImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Multiple extends Model
{
    use HasFactory;

    protected $fillable = [
        'kalimat',
        'A',
        'B',
        'C',
        'D',
        'E',
        'kunci',  
        'kelas_id',
        'lesson_id'
    ];

    public function import()
    {
        Excel::import(new MultiplesImport, 'soal-piligan-ganda');
    }

    public function lessons(){
        return $this->hasMany(Lesson::class,'multiple_lesson','kelas_id','lesson_id');
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    
}
