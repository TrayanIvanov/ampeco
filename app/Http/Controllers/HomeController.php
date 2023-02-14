<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriberRequest;
use App\Models\BitcoinTrade;
use App\Models\Subscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function show(): View
    {
        $trades = BitcoinTrade::all();

        $labels = $trades->map(fn (BitcoinTrade $trade) => $trade->created_at->format('d.m.y H:i'));
        $bitcoinValues = $trades->map(fn (BitcoinTrade $trade) => $trade->price);

        return view('welcome', [
            'labels' => $labels,
            'bitcoinValues' => $bitcoinValues,
        ]);
    }

    public function store(StoreSubscriberRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $subscriber = new Subscriber();
        $subscriber->email = $validated['email'];
        $subscriber->price = $validated['price'];
        $subscriber->save();

        return redirect()->action([HomeController::class, 'show']);
    }
}
