<?php

namespace App\Jobs;

use App\Models\BitcoinTrade;
use App\Models\Subscriber;
use App\Services\TickerableInterface;
use App\Services\UserNotifiableInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class BitcoinDataCrawler implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private TickerableInterface $tickerable;
    private UserNotifiableInterface $notifiable;

    public function __construct(TickerableInterface $tickerable, UserNotifiableInterface $notifiable)
    {
        $this->tickerable = $tickerable;
        $this->notifiable = $notifiable;
    }

    public function handle(): void
    {
        $price = $this->tickerable->ticker();

        $bitcoinTrade = new BitcoinTrade();
        $bitcoinTrade->price = $price;
        $bitcoinTrade->save();

        $subscribers = Subscriber::all();
        $this->notifiable->notifyPriceUp($subscribers, $price);
    }
}
