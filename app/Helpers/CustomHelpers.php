<?php

use Illuminate\Support\Str;

if (!function_exists('selisihWaktu')) {
    function selisihWaktu($tanggal)
    {
        $awal = new DateTime($tanggal);
        $akhir = new DateTime();
        if ($awal < $akhir) {
            echo "0 hari";
        } else {
            $diff = $awal->diff($akhir);
            echo  $diff->format('%a hari');
        }
    }
}

if (!function_exists('avatarNama')) {
    function avatarNama($anonim, $nama)
    {
        if ($anonim == 1) {
            $hamba = 'Hamba Allah';
            echo Str::limit($hamba, 2, '');
        } else {
            echo Str::limit($nama, 2, '');
        }
    }
}

if (!function_exists('nama')) {
    function nama($anonim, $nama)
    {
        if ($anonim == 1) {
            $hamba = 'Hamba Allah';
            echo $hamba;
        } else {
            echo $nama;
        }
    }
}

if (!function_exists('formatRupiah')) {
    function formatRupiah($angka)
    {
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
}

if (!function_exists('formatNomorIndonesia')) {
    function formatNomorIndonesia($nomor)
    {
        return preg_replace('/^0/', '62', $nomor);
    }
}
