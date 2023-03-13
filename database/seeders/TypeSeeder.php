<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Type;


class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types = ['scolastico' , 'prova1', 'prova2', 'grande'];

        foreach ($types as $par) {
            $type = new Type();
            $type->title = $par;
            $type->color = $faker->hexColor();
            $type->save();
        }
    }
}
