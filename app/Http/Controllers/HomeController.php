<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriberRequest;
use App\Models\BitcoinTrade;
use App\Models\Subscriber;
use App\Services\ChartDataHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HomeController extends Controller
{
    private ChartDataHelper $chartDataHelper;

    public function __construct(ChartDataHelper $chartDataHelper)
    {
        $this->chartDataHelper = $chartDataHelper;
    }

    public function show(): View
    {
        $trades = BitcoinTrade::all();

        return view('welcome', $this->chartDataHelper->getData($trades));
    }

    public function showVue(): View
    {
        $trades = BitcoinTrade::all();

        return view('welcome_vue', $this->chartDataHelper->getData($trades));
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
