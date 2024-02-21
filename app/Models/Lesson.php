<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_mapel',
        'teacher_id',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function kelases()
    {
        return $this->belongsToMany(Kelas::class,'kelas_lesson')
        ->withPivot('kelas_id','lesson_id');
        ;
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class,'kelas_teacher','kelas_id','teacher_id');
    }
    public function subject()
    {
        return $this->hasMany(Subject::class);
    }

    public function students()
    {
        return $this->belongsToMany(Lesson::class,'lesson_student');
    }

}
