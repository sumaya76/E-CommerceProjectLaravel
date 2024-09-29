<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('deals')->insert([
            'title' => 'Spinach',
            'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia',
            'original_price' => 10.00,
            'discount_price' => 5.00,
            'end_time' => Carbon::now()->addDays(1), // The deal expires in 1 day
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
