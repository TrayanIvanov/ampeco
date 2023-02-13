<?php

namespace App\Jobs;

use App\Models\BitcoinTrade;
use App\Services\TickerableInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CollectData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private TickerableInterface $tickerable;

    public function __construct(TickerableInterface $tickerable)
    {
        $this->tickerable = $tickerable;
    }

    public function handle(): void
    {
        $price = $this->tickerable->ticker();

        $bitcoinTrade = new BitcoinTrade();
        $bitcoinTrade->price = $price;
        $bitcoinTrade->save();

        // TODO FIND users with monitored price < current price
        // TODO send email
    }
}
