<?php

use Illuminate\Database\Seeder;
use App\Categories;
use App\User;

class ProductSeeder extends Seeder
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
        $cateIds = Categories::all()->pluck('id')->toArray();
        $userIds = User::all()->pluck('id')->toArray();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('products')->insert([
                'name' => $faker->name,
                'price' => $faker->numberBetween(1000,999999999),
                'type' => $faker->company,
                'images' => $faker->imageURl(),
                'keyword' => strtolower($faker->text),
                'description' => $faker->text($maxNbChars = 200),
                'user_id' => $faker->randomElement($userIds),
                'cate_id' => $faker->randomElement($cateIds),
                'created_at' => $faker->dateTime($max = 'now'),
                'updated_at' => $faker->dateTime($max = 'now'),
            ]);
        }
    }
}
