<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BitcoinTrade;
use App\Services\ChartDataHelper;
use Illuminate\Http\JsonResponse;

class BitcoinTradesApiController extends Controller
{
    private ChartDataHelper $chartDataHelper;

    public function __construct(ChartDataHelper $chartDataHelper)
    {
        $this->chartDataHelper = $chartDataHelper;
    }

    public function index(): JsonResponse
    {
        $bitcoinTrades = BitcoinTrade::all();

        return new JsonResponse($this->chartDataHelper->getData($bitcoinTrades));
    }
}
