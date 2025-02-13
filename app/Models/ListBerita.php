<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ListBerita extends Model
{
    use HasFactory;

    protected $fillable = [
        'berita_penyaluran_id',
        'judul',
        'ket'
    ];

    public function Berita(): BelongsTo
    {
        return $this->belongsTo(BeritaPenyaluran::class);
    }
}
