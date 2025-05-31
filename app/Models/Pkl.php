<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Industri; // ✅ Ganti dari "Industris"

class Pkl extends Model
{
    protected $fillable = [
        'siswa_id',
        'industri_id',
        'guru_id',
        'mulai',
        'selesai',
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function guru(): BelongsTo
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    public function industri(): BelongsTo
    {
        return $this->belongsTo(Industris::class, 'industri_id');
    }
}
