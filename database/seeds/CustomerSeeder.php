<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
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
            DB::table('customers')->insert([
                'name' => $faker->name,
                'address' => $faker->address,
                'phonenumber' => $faker->phoneNumber,
                'accept_time' => $faker->dateTime($max = 'now'),
                'created_at' => $faker->dateTime($max= 'now')
            ]);
        }
    }
}
