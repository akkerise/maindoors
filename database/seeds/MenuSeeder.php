<?php

use Illuminate\Database\Seeder;
use App\Categories;
class MenuSeeder extends Seeder
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
        $cateIds = Categories::all()->pluck('id')->toArray();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('menus')->insert([
                'name' => $faker->name,
                'cate_id' => $faker->randomElement($cateIds),
                'parent_id' => rand(1,20),
                'created_at' => $faker->dateTime($max = 'now'),
                'updated_at' => $faker->dateTime($max = 'now'),
            ]);
        }
    }
}
