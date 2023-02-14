<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bitcoin_trades')->insert([
            [
                'price' => 10331.34,
                'created_at' => Carbon::create('-6 days'),
                'updated_at' => Carbon::create('-6 days'),
            ],
            [
                'price' => 4317.98,
                'created_at' => Carbon::create('-5 days'),
                'updated_at' => Carbon::create('-5 days'),
            ],
            [
                'price' => 15266.38,
                'created_at' => Carbon::create('-4 days'),
                'updated_at' => Carbon::create('-4 days'),
            ],
            [
                'price' => 13655.26,
                'created_at' => Carbon::create('-3 days'),
                'updated_at' => Carbon::create('-3 days'),
            ],
            [
                'price' => 20349.11,
                'created_at' => Carbon::create('-2 days'),
                'updated_at' => Carbon::create('-2 days'),
            ],
            [
                'price' => 17346.13,
                'created_at' => Carbon::create('-1 days'),
                'updated_at' => Carbon::create('-1 days'),
            ],
        ]);
    }
}
