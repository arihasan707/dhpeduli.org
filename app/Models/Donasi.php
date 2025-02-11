<?php

namespace App\Models;

use App\Models\Program;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'inv',
        'nama',
        'telp',
        'email',
        'anonim',
        'pesan',
        'amount',
        'status',
    ];


    public function Program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }
}
