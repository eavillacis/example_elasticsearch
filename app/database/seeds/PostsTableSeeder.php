<?php

class PostsTableSeeder extends Seeder {

    public function run()
    {
        // Remove any existing data
        DB::table('posts')->truncate();

        $faker = Faker\Factory::create();

        // Generate some dummy data
        for($i=0; $i<30; $i++) {
            Post::create([
                'title' => $faker->sentence(3),
                'content' => $faker->paragraph(5),
                'tags' => join(',', $faker->words(5))
            ]);
        }
    }

}
