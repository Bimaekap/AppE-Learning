<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tugas',
        'file_tugas',
        'nama_mapel',
        'nilai',
        'student_id',
        'kelas_id',
        'nama_siswa',
        'subject_id',
    ];

    public function student()
    {
        return $this->hasMany(Student::class, 'id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
