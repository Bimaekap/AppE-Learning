<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $keyType = 'string';
    protected $cast = [
        'lesson_id' => 'integer',
        'nama_materi' => 'string',
        'nama_mapel_get' => 'string',
        'nama_kelas_get' => 'string',
    ];
    
    protected $fillable = [
    'lesson_id',
       'nama_materi',
       'nama_file',
       'nama_mapel_get',
       'nama_kelas_get',
       'nama_guru',
       'kelas_id',
       'teacher_id',
    ];


    public function lesson()
    {
        return $this->belongsTo(Lesson::class,'id');
    }

    public function teacher(){
        return $this->hasMany(Teacher::class,'nama');
    }
}
