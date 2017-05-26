<?php

use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
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
        $userIds = \App\User::all()->pluck('id')->toArray();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('images')->insert([
                'image' => $faker->imageUrl($width = 1000, $height = 1000),
                'user_id' => $faker->randomElement($userIds),
                'created_at' => $faker->dateTime($max = 'now'),
                'updated_at' => $faker->dateTime($max = 'now'),
            ]);
        }
    }
}
