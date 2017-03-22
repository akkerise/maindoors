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
        $limit = 10;
        $productIds = App\Product::all()->pluck('id')->toArray();
        $custom_fieldIds = App\CustomField::all()->pluck('id')->toArray();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('product_custom_fields')->insert([
                'custom_field_id' => $faker->randomElement($custom_fieldIds),
                'product_id' => $faker->randomElement($productIds),
            ]);
        }
    }
}
