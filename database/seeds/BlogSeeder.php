<?php

use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $faker->addProvider(new BlogArticleFaker\FakerProvider($faker));
        $limit = 88;
        $userIds = \App\User::all()->pluck('id')->toArray();
        $categoryIds = \App\Categories::all()->pluck('id')->toArray();
        $tagIds = \App\Tag::all()->pluck('id')->toArray();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('blogs')->insert([
                'title' => $faker->title,
                'content' => $faker->text(rand(555,888)),
                'author' => $faker->name,
                'user_id' => $faker->randomElement($userIds),
                'tag_id' => $faker->randomElement($tagIds),
                'category_id' => $faker->randomElement($categoryIds),
                'created_at' => $faker->dateTime($max = 'now'),
                'updated_at' => $faker->dateTime($max = 'now'),
            ]);
        }
    }
}
