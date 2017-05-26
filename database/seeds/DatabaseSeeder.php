<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CustomerSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(CustomFieldSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(ProductCustomFieldSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(ImageTagSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(CommentSeeder::class);
    }
}
