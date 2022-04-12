<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::truncate();

        $data = [
            [
                'id'   => 1,
                'title' => 'Türkçe',
                'code' => 'tr'
            ],
            [
                'id'   => 2,
                'title' => 'English',
                'code' => 'en'
            ]
        ];

        foreach ($data as $item) {
            Language::insert($item);
        }

    }
}
