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
                'pointer' => 'sandals',
                'percentage' => 15,
            ],
            [
                'type' => 'category',
                'pointer' => 'boots',
                'percentage' => 15,
            ],
            [
                'type' => 'sku',
                'pointer' => '000003',
                'percentage' => 30,
            ]
        ];
        foreach ($discounts as $discount){
            Discount::query()->updateOrCreate($discount);
        }
    }
}
