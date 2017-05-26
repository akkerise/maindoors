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
        $limit = 20;
//        $candidates = Candidate::lists('id');
        for ($i = 1; $i < $limit; $i++) {
            DB::table('categories')->insert([
                'name' => $faker->name,
                'keyword' => strtolower($faker->text($maxNbChars = 15)),
                'description' => $faker->text($maxNbChars = 200),
                'parent_id' => rand(1,$limit),
                'created_at' => $faker->dateTime($max = 'now'),
                'updated_at' => $faker->dateTime($max = 'now'),
            ]);
        }
    }
}
