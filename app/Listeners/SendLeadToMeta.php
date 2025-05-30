<?php

namespace App\Listeners;

use App\Events\LeadCreated;
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
        $lead = $event->lead;
        $eventId = $event->eventId;

        $payload = [
            'data' => [
                [
                    'event_name' => 'Lead',
                    'event_time' => time(),
                    'action_source' => 'website',
                    'event_source_url' => url()->current(),
                    'event_id' => $eventId,
                    'user_data' => [
                        'fn' => [hash('sha256', strtolower($lead->nama))],
                        'ph' => [hash('sha256', strtolower($lead->telp))],
                        'client_ip_address' => request()->ip(),
                        'client_user_agent' => request()->userAgent(),
                    ]
                ]
            ],
            'access_token' => env('META_ACCESS_TOKEN'),
            'test_event_code' => env('META_TES_ID'),
        ];

        Http::post(
            'https://graph.facebook.com/v23.0/' . env('META_PIXEL_ID') . '/events',
            $payload
        );
    }
}
