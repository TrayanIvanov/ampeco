<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscriberRequest;
use App\Models\Subscriber;
use Illuminate\Http\JsonResponse;

class SubscribersApiController extends Controller
{
    public function store(StoreSubscriberRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $subscriber = new Subscriber();
        $subscriber->email = $validated['email'];
        $subscriber->price = $validated['price'];
        $subscriber->save();

        return new JsonResponse();
    }
}
