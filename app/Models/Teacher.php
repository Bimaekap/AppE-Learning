<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Mockery\Matcher\Subset;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nomor_induk',
        'nama',
        'jabatan',
        'alamat',
        'jenis_kelamin',
        'nomor_hp',
    ];

    // protected $primaryKey = ['teacher_id'];

    // protected $keyType = 'string';

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function lesson()
    {
        return $this->hasMany(Lesson::class,'id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function kelases()
    {
        return $this->belongsToMany(Kelas::class,'kelas_teacher')
        ->as('data_guru');
    }
}
