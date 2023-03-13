<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 5 ; $i++) { 
            $new_proj = new Project();
            $new_proj->title = $faker->name();
            $new_proj->description = $faker->paragraph();
            $new_proj->proj_link = $faker->paragraph();
            $new_proj->img  = $faker->paragraph();
            $new_proj->collab = $faker->paragraph();
            $new_proj->save();
        }
    }
}
