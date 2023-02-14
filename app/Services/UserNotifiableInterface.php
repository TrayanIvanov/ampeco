<?php

namespace App\Services;

interface UserNotifiableInterface
{
    public function notifyPriceUp(float $price): void;
}
