<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;

class languagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            [
                'name' => 'HTML',
                'color' => 'Red'
            ],
            [
                'name' => 'CSS',
                'color' => 'BLUE'
            ],
            [
                'name' => 'BOOTSTRAP',
                'color' => 'PURPLE'
            ],
            [
                'name' => 'JAVASCRIPT',
                'color' => 'YELLOW'
            ],
            [
                'name' => 'VUE',
                'color' => 'GREEN'
            ],
            [
                'name' => 'SCSS',
                'color' => 'PINK'
            ],
            [
                'name' => 'PHP',
                'color' => 'MAGENTA'
            ],
            [
                'name' => 'LARAVEL',
                'color' => 'ORANGE'
            ],
        ];

        foreach ($languages as $language) {
            $new_lang = new Language();
            $new_lang->name = $language['name'];
            $new_lang->color = $language['color'];
            $new_lang->save();
        }
    }
}