<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

interface UserNotifiableInterface
{
    public function notifyPriceUp(Collection $subscribers, float $price): void;
}
