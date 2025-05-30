<?php

namespace App\Http\Controllers;

use App\Events\LeadCreated;
use App\Models\Donasi;
use App\Models\Program;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index(Program $program)
    {
        $judulHeader = str::limit($program->judul, 39);
        $judulDonasi = str::limit($program->judul, 36);
        return view('donasi', compact('program', 'judulHeader', 'judulDonasi'));
    }

    public function transaksi(Request $request)
    {
        function generate_kode()
        {
            do {
                $kode = random_int(1000000000000, 9999999999999);
            } while (Donasi::where('kode', '=', $kode)->first());

            return $kode;
        }

        //kode invoice
        $inv = 'DHP-' . generate_kode();

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.isProduction');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = config('midtrans.is3ds');

        $params = array(
            'transaction_details' => array(
                'order_id' => $inv,
                'gross_amount' => $request->amount,
            ),
            'customer_details' => array(
                'first_name' => $request->nama,
                'email' => $request->email,
                'phone' => $request->telp,
            )
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $donasi = new Donasi();
        $donasi->program_id = $request->program_id;
        $donasi->kode = $inv;
        $donasi->nama = $request->nama;
        $donasi->telp = $request->telp;
        $donasi->email = $request->email;
        $donasi->anonim = $request->anonim;
        $donasi->pesan = $request->pesan;
        $donasi->amount = $request->amount;
        $donasi->snap = $snapToken;
        $donasi->save();

        // Buat event_id (deduplication)
        $eventId = (string) Str::uuid();

        #triger event meta ads
        $lead = [
            'nama' => $request->nama,
            'telp' => $request->telp
        ];

        event(new LeadCreated($lead, $eventId));

        $request->session()->put('event_id', $eventId);

        return response()->json([
            'massage' => 'Transaksi berhasil dibuat',
            'order_id' => $inv,
        ], 200);
    }

    public function payment(Donasi $donasi, $slug)
    {
        return view('payment.charge', compact('donasi', 'slug'));
    }

    public function payment_success(Donasi $donasi, $slug)
    {
        return view('payment.success', compact('donasi', 'slug'));
    }

    public function payment_expire(Donasi $donasi, $slug)
    {
        return view('payment.expire', compact('donasi', 'slug'));
    }

    public function expire_midtrans(Request $request)
    {
        $order_id = $request->query('order_id');
        $donasi = Donasi::where('kode', $order_id)->first();
        $donasi->status = 'expire';
        $donasi->save();

        return view('payment.expire_midtrans', compact('donasi'));
    }
}
