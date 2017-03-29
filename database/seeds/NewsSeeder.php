<?php

use Illuminate\Database\Seeder;
use App\Categories;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 100;
        $cateIds = Categories::all()->pluck('id')->toArray();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('news')->insert([
                'title' => $faker->name,
                'content' => $faker->numberBetween(1000,999999999),
                'description' => $faker->text($maxNbChars = 300),
                'parent_id' => rand(1,20),
                'cate_id' => $faker->randomElement($cateIds),
                'created_at' => $faker->dateTime($max = 'now'),
                'updated_at' => $faker->dateTime($max = 'now'),
            ]);
        }
    }
}
