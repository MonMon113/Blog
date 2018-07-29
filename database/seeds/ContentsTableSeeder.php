<?php

use Illuminate\Database\Seeder;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 30;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('contents')->insert([
                'subject' => $faker->realText($maxNbChars = 50, $indexSize = 2),
                'content' => $faker->realText($maxNbChars = 700, $indexSize = 5),
                'url' => $faker->imageUrl($width = 640, $height = 480),
                'user_id' => $faker->numberBetween($min = 1, $max = 31),
        		'created_at' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
            ]);
        }
    }
}
