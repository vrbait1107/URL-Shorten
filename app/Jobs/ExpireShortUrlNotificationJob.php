<?php

namespace App\Jobs;

use App\Models\ShortUrl;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ExpireShortUrlNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $expiredUrls = ShortUrl::whereBetween('deactivated_at', [now()->subMinute(5), now()])
            ->get(['id', 'default_short_url', 'destination_url']);

        foreach ($expiredUrls as $key => $value) {
            try {
                Mail::raw("Your short URL {$value->default_short_url} has expired.", function ($message) {
                    $message->to(config('app.admin_email'))
                        ->subject('Short URL Expired');
                });
            } catch (\Exception $e) {
                continue;
            }
        }
    }
}
