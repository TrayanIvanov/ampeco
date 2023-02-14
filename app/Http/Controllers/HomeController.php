<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriberRequest;
use App\Models\Subscriber;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function show(): View
    {
        return view('welcome');
    }

    public function store(StoreSubscriberRequest $request): View
    {
        $validated = $request->validated();

        $subscriber = new Subscriber();
        $subscriber->email = $validated['email'];
        $subscriber->price = $validated['price'];
        $subscriber->save();

        return view('welcome');
    }
}
