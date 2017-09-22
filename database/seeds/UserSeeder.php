<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([
                'fullname' => $faker->name,
                'username' => $faker->userName,
                'email' => $faker->safeEmail,
                'password' => $faker->password,
                'address' => $faker->address,
                'gender' => rand(1, 4),
                'description' => $faker->text($maxNbChars = 200),
                'total_money' => $faker->numberBetween($min = 10000, $max = 999999999),
                'confirm_code' => Hash::make($faker->name),
                'confirmed' => $faker->boolean(),
                'level' => $faker->numberBetween($min = 1, $max = 4),
                'remember_token' => $faker->sha256,
                'api_token' => $faker->sha256,
                'image_avatar' => $faker->imageUrl($width=1000,$height=1000),
                'created_at' => $faker->dateTime($max = 'now'),
                'updated_at' => $faker->dateTime($max = 'now'),
            ]);
        }

        if (empty(DB::table('users')->where('username', 'akkerise')->first())) {
            DB::table('users')->insert([
                'fullname' => 'AkKeRise',
                'username' => 'akkerise',
                'password' => Hash::make('1chocxuongho'),
                'email' => 'akkerise@gmail.com',
                'address' => $faker->address,
                'gender' => 1,
                'description' => $faker->text($maxNbChars = 200),
                'total_money' => $faker->numberBetween($min = 10000, $max = 999999999),
                'confirm_code' => Hash::make($faker->name),
                'confirmed' => true,
                'level' => 1,
                'remember_token' => $faker->sha256,
                'image_avatar' => $faker->imageUrl($width=1000,$height=1000),
                'created_at' => $faker->dateTime($max = 'now'),
                'updated_at' => $faker->dateTime($max = 'now'),
            ]);
        }
    }
}
