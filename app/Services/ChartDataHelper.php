<?php

namespace App\Services;

use App\Models\BitcoinTrade;
use Illuminate\Database\Eloquent\Collection;

class ChartDataHelper
{
    public function getData(Collection $trades): array
    {
        return [
            'labels' => $trades->map(fn (BitcoinTrade $trade) => $trade->created_at->format('d.m.y H:i')),
            'bitcoinValues' => $trades->map(fn (BitcoinTrade $trade) => $trade->price),
        ];
    }
}
