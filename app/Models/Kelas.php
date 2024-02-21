<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kelas',
        'kode_kelas',
        'teacher_id',
        'kelas_id',
        'lesson_id'
    ];


    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }

    public function teacher()
    {
        return $this->hasMany(Teacher::class, 'id');
    }

    public function lesson()
    {
        return $this->hasMany(Lesson::class, 'id');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'kelas_teacher')
            ->withPivot('kelas_id', 'teacher_id');
    }

    public function student()
    {
        return $this->hasMany(Student::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'kelas_student', 'kelas_id', 'student_id');
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'kelas_lesson')
            ->withPivot('kelas_id', 'lesson_id');
    }

    public function subject()
    {
        return $this->hasMany(Subject::class, 'id');
    }
}
