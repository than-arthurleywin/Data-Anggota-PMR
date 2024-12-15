<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anggotans extends Model
{
    use HasFactory;

    protected $table = 'anggotans';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nama', 'nis', 'jurusan_id', 'angkatan_id', 'telepon'];

    public function jurusan() : BelongsTo {
        return $this->belongsTo(Jurusan::class);
    }

    public function angkatan() : BelongsTo {
        return $this->belongsTo(Angkatans::class);
    }
}
