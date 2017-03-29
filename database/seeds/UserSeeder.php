<?php

use Illuminate\Database\Seeder;

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
        $limit = 100;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([
                'username' => $faker->userName,
                'password' => $faker->password,
                'email' => $faker->safeEmail,
                'address' => $faker->address,
                'gender' => rand(1,4),
                'description' => $faker->text($maxNbChars = 200),
                'total_money' => $faker->numberBetween($min=10000 ,$max=999999999),
                'created_at' => $faker->dateTime($max = 'now'),
                'updated_at' => $faker->dateTime($max = 'now'),
            ]);
        }
    }
}
