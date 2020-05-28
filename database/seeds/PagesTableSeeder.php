<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

use App\Page;
use App\User;
use App\Category;
use App\Tag;
use App\Photo;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            $user = User::inRandomOrder()->first();
            $category =  Category::inRandomOrder()->first();
            $page = new Page;
            $page->user_id = $user->id;
            $page->category_id = $category->id;
            $page->title = $faker->sentence(6, true);
            $page->body = $faker->paragraph(10, true);
            $page->summary = $faker->paragraph(1);
            $page->slug = Str::slug($page->title, '-');
            $page->save();

            $photos = Photo::inRandomOrder()->limit(rand(2, 4))->get();
            $page->photos()->attach($photos);
            $tags = Tag::inRandomOrder()->limit(rand(2, 6))->get();
            $page->tags()->attach($tags);
        }
    }
}
