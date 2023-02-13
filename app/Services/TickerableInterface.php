<?php

namespace App\Services;

interface TickerableInterface
{
    public function ticker(): float;
}
