<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas';
    protected $guarded = ['id'];
    protected $fillable = ['nis', 'nama_siswa', 'password'];
    protected $hidden = ['password'];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
    public function nilai(){
        return $this->hasOne(Nilai::class);
    }
}

