<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class BitfinexApi implements TickerableInterface
{
    public const API_URL = 'https://api.bitfinex.com/v1/pubticker/BTCUSD';

    public function ticker(): float
    {
        $response = Http::get(self::API_URL);

        $price = json_decode($response->body(), true)['last_price'];

        return number_format($price, 2, '.', '');
    }
}
