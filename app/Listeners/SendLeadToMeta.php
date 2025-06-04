<?php

namespace App\Listeners;

use App\Events\LeadCreated;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendLeadToMeta
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(LeadCreated $event): void
    {
        $purchase = $event->purchase;
        try {
            Log::info('pixel', [
                'purchase' => $purchase
            ]);
            $payload = [
                'data' => [
                    [
                        'event_name' => 'Purchase',
                        'event_time' => time(),
                        'action_source' => 'website',
                        'event_source_url' => url()->current(),
                        'user_data' => [
                            'fn' => [hash('sha256', strtolower($purchase['nama']))],
                            'ph' => [hash('sha256', strtolower($purchase['telp']))],
                            'client_ip_address' => request()->ip(),
                            'client_user_agent' => request()->userAgent(),
                        ],
                        'custom_data' => [
                            'currency' => 'IDR',
                            'value' => $purchase['amount']
                        ],
                    ]
                ],
                'access_token' => config('pixel.pixelAccessToken'),
                // 'test_event_code' => config('pixel.pixelTestingId'),
            ];
            Http::post(
                'https://graph.facebook.com/v23.0/' . config('pixel.pixelId') . '/events',
                $payload
            );
        } catch (\Throwable $th) {
            Log::info("purchaseMeta", $th);
        }
    }
}
