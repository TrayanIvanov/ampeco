<?php

namespace Tests\Unit\Services;

use App\Models\Subscriber;
use App\Services\UserNotifier;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class UserNotifierTest extends TestCase
{
    public function test_notify_on_price_up(): void
    {
        $subscriber1 = new Subscriber();
        $subscriber1->email = 'loremips1@test.com';
        $subscriber1->price = 100.23;

        $subscriber2 = new Subscriber();
        $subscriber2->email = 'loremips2@test.com';
        $subscriber2->price = 100.27;

        $subscribers = new Collection();
        $subscribers->add($subscriber1);
        $subscribers->add($subscriber2);

        Mail::shouldReceive('raw')->once();

        (new UserNotifier())->notifyPriceUp($subscribers, 100.25);
    }
}
