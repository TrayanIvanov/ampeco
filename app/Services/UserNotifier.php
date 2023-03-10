<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Mail;

class UserNotifier implements UserNotifiableInterface
{
    public function notifyPriceUp(Collection $subscribers, float $price): void
    {
        foreach ($subscribers as $subscriber) {
            if ($price > $subscriber->price) {
                Mail::raw(
                    sprintf('BTC has exceeded the limit you set of %s USD. Current price is %s USD.',
                        $subscriber->price,
                        $price
                    ),
                    fn ($message) => $message->to($subscriber->email)->subject('Price went high!')
                );
            }
        }
    }
}
