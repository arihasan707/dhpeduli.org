<?php

namespace App\Models;

use App\Models\Program;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BeritaUmum extends Model
{
    use HasFactory;

    protected $fillable = [
        'prog_id',
        'judul',
        'foto',
        'slug',
        'cta',
        'isi'
    ];

    public function Program(): BelongsTo
    {
        return $this->belongsTo(Program::class, 'prog_id');
    }
}
