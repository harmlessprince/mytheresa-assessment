<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $discounts = [
            [
                'type' => 'category',
                'pointer' => 'boots',
                'percentage' => 30,
            ],
            [
                'type' => 'sku',
                'pointer' => '000003',
                'percentage' => 15,
            ]
        ];
        foreach ($discounts as $discount){
            Discount::query()->updateOrCreate($discount);
        }
    }
}
