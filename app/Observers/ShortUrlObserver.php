<?php

namespace App\Observers;

use AshAllenDesign\ShortURL\Models\ShortURL;

class ShortUrlObserver
{
    public function creating(ShortURL $shortURL): void
    {
        if (!empty(config('short-url.url'))) {
            $shortURL->default_short_url = config('short-url.url') . '/' . $shortURL->url_key;
        }
    }
}
