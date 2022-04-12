<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Description;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::truncate();
        $items = [[
            'phone' => '0212 292 11 11',
            'address' => 'Emirgan, Sakıp Sabancı Cd. No:88 / Sarıyer/ İstanbul',
            'status' => 1,
            'lat' => 41.100279,
            'lng' => 29.054579,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]];
        $descriptions = [
            [
                'language_id' => 1,
                'title' => 'Vezirhan Emirgan <strong>Sarıyer</strong>',
                'slug' => 'vezirhan-emirgan-sariyer',
                'description' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3006.5680631771215!2d29.05238495068855!3d41.10028322160587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cacb927942dfc9%3A0x70b6220f18896298!2sVEZIR%20HAN%20EMIRGAN%20BOSPHORUS!5e0!3m2!1str!2str!4v1643268267920!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'seo_url' => 'vezirhan-emirgan-sariyer',
                'seo_title' => 'Vezirhan Emirgan Sarıyer',
                'seo_description' => '',
                'descriptionable_id' => 1,
                'descriptionable_type' => 'App\Models\Branch',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'language_id' => 2,
                'title' => 'Vezirhan Emirgan <strong>Sarıyer</strong>',
                'slug' => 'vezirhan-emirgan-sariyer-2',
                'description' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3006.5680631771215!2d29.05238495068855!3d41.10028322160587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cacb927942dfc9%3A0x70b6220f18896298!2sVEZIR%20HAN%20EMIRGAN%20BOSPHORUS!5e0!3m2!1str!2str!4v1643268267920!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'seo_url' => 'vezirhan-emirgan-sariyer-2',
                'descriptionable_id' => 1,
                'descriptionable_type' => 'App\Models\Branch',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        $files = [
            [
                'file_id' => 3,
                'fileable_id' => 1,
                'fileable_type' => 'App\Models\Branch',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        foreach ($items as $data) {
            Branch::insert($data);
        }
        foreach ($descriptions as $description) {
            Description::insert($description);
        }
        foreach ($files as $data) {
            DB::table('fileables')->insert($data);
        }
    }
}
