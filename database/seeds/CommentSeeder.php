<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 88;
        $userIds = App\User::all()->pluck('id')->toArray();
        $blogIds = App\Blog::all()->pluck('id')->toArray();
        for ($i = 1; $i < $limit; $i++) {
            DB::table('comments')->insert([
                'comment' => $faker->text(rand(100,400)),
                'user_id' => $faker->randomElement($userIds),
                'blog_id' => $faker->randomElement($blogIds),
                'parent_id' => rand(1,$limit),
                'created_at' => $faker->dateTime($max = 'now'),
                'updated_at' => $faker->dateTime($max = 'now'),
            ]);
        }
    }
}
