<?php

namespace App\Models;


use App\Models\Role;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Mockery\Matcher\Subset;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
        'password',
        'role',
        'foto',
    ];


    protected $cast = [
        'last_login' => 'datetime:Y-m-d h:i:s',
    ];

    public function teacher()
    {
        return $this->hasMany(Teacher::class);
    }
    public function items()
    {
        return $this->hasManyThrough(Teacher::class,Kelas::class,'teacher_id','user_id','id','id')
        ->withPivot('kelas_lesson');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class,'teacher_id');
    }

    public function kelas()
    {
        return $this->hasManyThrough(Kelas::class,Teacher::class);
    }
    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
