<?php

namespace Database\Seeders;

use App\Models\Description;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::truncate();
        Slider::create([
            'status' => 1,
            'row_number' => 1,
            'release_date' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $descriptions = [
            [
                'language_id' => 1,
                'title' => 'Şark Restoranı',
                'slug' => '',
                'sub_title' => 'İstanbul\'un En Lezzetli',
                'short_description' => 'Vezirhan Emirgan\'a Hoşgeldiniz.',
                'descriptionable_id' => 1,
                'descriptionable_type' => 'App\Models\Slider',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'language_id' => 2,
                'title' => 'Şark Restoranı',
                'slug' => '',
                'sub_title' => 'İstanbul\'un En Lezzetli',
                'short_description' => 'Vezirhan Emirgan\'a Hoşgeldiniz.',
                'descriptionable_id' => 1,
                'descriptionable_type' => 'App\Models\Slider',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        $files = [
            [
                'file_id' => 3,
                'fileable_id' => 1,
                'fileable_type' => 'App\Models\Slider',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        foreach ($descriptions as $data) {
            Description::insert($data);
        }

        foreach ($files as $data) {
            DB::table('fileables')->insert($data);
        }
    }
}
