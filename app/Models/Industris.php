<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Guru; // Tambahkan import model Guru

class Industris extends Model
{
    use HasFactory;

    protected $table = 'industris';

    protected $fillable = [
        'nama',
        'bidang_usaha',
        'alamat',
        'kontak',
        'email',
        'guru_pembimbing',
    ];

    // Relasi ke Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_pembimbing');
    }

    // Relasi ke PKL
    public function pkls()
    {
        return $this->hasMany(Pkl::class);
    }
}
