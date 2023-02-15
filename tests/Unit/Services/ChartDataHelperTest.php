<?php

namespace Tests\Unit\Services;

use App\Models\BitcoinTrade;
use App\Services\ChartDataHelper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class ChartDataHelperTest extends TestCase
{
    public function test_get_data(): void
    {
        $trade1 = new BitcoinTrade();
        $trade1->price = 100.12;
        $trade1->created_at = Carbon::create(2023, 9, 10, 12);
        $trade2 = new BitcoinTrade();
        $trade2->price = 200.12;
        $trade2->created_at = Carbon::create('-2 days');
        $trades = new Collection();
        $trades->add($trade1);
        $trades->add($trade2);

        $data = (new ChartDataHelper())->getData($trades);

        $this->assertIsArray($data);
        $this->assertCount($trades->count(), $data);
        $this->assertCount(2, $data['labels']);
        $this->assertCount(2, $data['bitcoinValues']);
        $this->assertEquals(100.12, $data['bitcoinValues'][0]);
        $this->assertEquals('10.09.23 12:00', $data['labels'][0]);
    }
}
