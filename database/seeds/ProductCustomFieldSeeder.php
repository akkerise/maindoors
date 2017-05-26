<?php

use Illuminate\Database\Seeder;

class ProductCustomFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 20;
//        $custom_fieldIds = \App\CustomField::all()->pluck('id')->toArray();
//        $productIds = \App\Product::all()->pluck('id')->toArray();
        for ($i = 1; $i < $limit; $i++) {
            DB::table('product_custom_fields')->insert([
                'custom_field_id' => rand(1,$limit),
                'product_id' => rand(1,$limit),
            ]);
        }
    }
}
