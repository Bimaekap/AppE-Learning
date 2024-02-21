<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_induk',
        'nama',
        'jabatan',
        'alamat',
        'jenis_kelamin',
        'nomor_hp',
        'kelas_id',
        'user_id'
    ];

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class,'id');
    }

    public function teacher()
    {
        return $this->hasMany(Teacher::class,'id');
    }
    public function kelases()
    {
        return $this->belongsToMany(Kelas::class,'kelas_student')
        ->withPivot('kelas_id','student_id');
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class,'lesson_student');
    }

}
