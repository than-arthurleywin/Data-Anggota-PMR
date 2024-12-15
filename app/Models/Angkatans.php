<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angkatans extends Model
{
    use HasFactory;

    protected $table = 'angkatans';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'angkatan', 'status'];
}
