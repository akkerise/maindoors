<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 50;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('categories')->insert([
                'name' => $faker->name,
                'keywords' => $faker->name,
                'description' => $faker->name,
                'parent_id' => rand(1, 20)
            ]);
        }
    }
}
