<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarKelas extends Model
{
    use HasFactory;
    use HasFactory;
    public $table = 'daftarKelas';
    public $fillable = [
        'namakelas',
        'materi',
        'tugas',
        'ujian',
    ];
}
