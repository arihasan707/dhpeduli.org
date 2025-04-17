<?php

namespace App\Exports;

use App\Models\Donasi; // Ganti YourModel dengan nama model Anda
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class DonasiExcel implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        return Donasi::whereBetween('created_at', [$this->startDate, $this->endDate])->get();
    }

    public function map($donasi): array
    {
        return [
            $donasi->nama,
            $donasi->program->judul,
            formatNomorIndonesia($donasi->telp),
            $donasi->email,
            formatRupiah($donasi->amount),
            $donasi->status,
            $donasi->created_at->format('Y-m-d')
        ];
    }

    public function headings(): array
    {
        return ["Nama", "Program", "Telpon", "Email", "Jumlah", "Status", "Tanggal Donasi"];
    }
}
