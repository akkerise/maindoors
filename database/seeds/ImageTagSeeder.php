<?php

use Illuminate\Database\Seeder;

class ImageTagSeeder extends Seeder
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
        $imageIds = App\Images::all()->pluck('id')->toArray();
        $tagIds = App\Tag::all()->pluck('id')->toArray();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('image_tags')->insert([
                'image_id' => $faker->randomElement($imageIds),
                'tag_id' => $faker->randomElement($tagIds),
                'created_at' => $faker->dateTime($max = 'now'),
                'updated_at' => $faker->dateTime($max = 'now'),
            ]);
        }
    }
}
