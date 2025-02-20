<?php

namespace App\Models;

use App\Models\ListBerita;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BeritaPenyaluran extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id'
    ];

    public function Program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function ListBerita(): HasMany
    {
        return $this->hasMany(ListBerita::class)->orderBy('id', 'desc');
    }
}
