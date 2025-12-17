<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class KnowledgeBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i=1;$i<=50;$i++){
            DB::table('knowledgebase')->insert([
                'question' => $faker->sentence(6),
                'answer' => $faker->paragraph(3),
                'image' => $faker->image(null, 80, 80)
            ]);
        }
    }
}
