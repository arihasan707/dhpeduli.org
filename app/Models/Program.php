<?php

namespace App\Models;

use App\Models\Donasi;
use App\Models\Kategori;
use App\Models\BeritaUmum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'desc_singkat',
        'detail_program',
        'kategori_id',
        'kebutuhan',
        'terkumpul',
        'sisa',
        'tipe_waktu',
        'waktu',
        'slug',
        'img'
    ];

    public function Kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    public function BeritaPenyaluran(): HasMany
    {
        return $this->hasMany(BeritaPenyaluran::class);
    }

    public function Donasis(): HasMany
    {
        return $this->hasMany(Donasi::class);
    }

    public function BeritaUmum(): HasOne
    {
        return $this->hasOne(BeritaUmum::class);
    }

    public function scopeSearch(Builder $query, array $filters): void
    {
        $query->when($filters['prog'] ?? false, function ($query, $prog) {
            $query->where('judul', 'like', '%' . $prog . '%')
                ->orWhere('detail_program', 'like', '%' . $prog . '%');
        });

        $query->when($filters['kategori'] ?? false, function ($query, $kategori) {
            $query->whereHas(
                'Kategori',
                fn($query) =>
                $query->where('nama', 'like', '%' . $kategori . '%')
            );
        });
    }
}