<?php

namespace Tests\Unit\Services;

use App\Services\BitfinexApi;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class BitfinexApiTest extends TestCase
{
    public function test_ticker(): void
    {
        Http::fake([
            BitfinexApi::API_URL => Http::response([
                'last_price' => '21500.43',
                'timestamp' => '1676328020',
            ])
        ]);

        $ticker = (new BitfinexApi())->ticker();

        $this->assertIsFloat($ticker);
        $this->assertEquals(21500.43, $ticker);
    }
}
