<?php

namespace App\Http\Controllers\Admin;

use App\Models\Donasi;
use App\Models\Program;
use App\Events\LeadCreated;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class NotifHandlerPaymentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $payload = $request->all();

        Log::info('midtrans', [
            'payload' => $payload
        ]);

        $order_id = $payload['order_id'];
        $status_code = $payload['status_code'];
        $amount = $payload['gross_amount'];

        $req_signature = $payload['signature_key'];

        $signature = hash('sha512', $order_id . $status_code . $amount . config('midtrans.serverKey'));

        if ($signature != $req_signature) {
            return response()->json([
                'message' => 'invalid signature'
            ], 401);
        }

        $order = Donasi::where('kode', $order_id)->firstOrFail();

        $program = Program::find($order->program_id);

        if (!$order) {
            return response()->json([
                'message' => 'invalid order'
            ], 400);
        }

        $transaction_status = $payload['transaction_status'];

        if ($transaction_status == 'settlement') {

            $order->status = 'settlement';
            $order->save();
            $program->terkumpul = $program->terkumpul + $order->amount;
            $program->save();

            return response()->json([
                'message' => 'transaksi settlement'
            ], 200);
        }

        if ($transaction_status == 'expire') {
            $order->status = 'expire';
            $order->save();

            return response()->json([
                'message' => 'transaksi expire'
            ], 202);
        }

        if ($transaction_status == 'pending') {
            $order->status = 'pending';
            $order->save();

            return response()->json([
                'message' => 'transaksi pending'
            ], 201);
        }
    }
}
