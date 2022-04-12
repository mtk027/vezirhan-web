<?php

namespace Database\Seeders;

use App\Models\Description;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::truncate();
        Page::create([
            'status' => 1,
            'row_number' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $descriptions = [
            [
                'language_id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'slug' => 'lorem-ipsum-dolor-sit-amet',
                'sub_title' => 'consectetur adipiscing elit, sed do eiusmod tempor incididunt',
                'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dictum varius duis at consectetur. Tempor nec feugiat nisl pretium fusce id velit ut tortor. Rhoncus dolor purus non enim praesent elementum. Hac habitasse platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper. Viverra mauris in aliquam sem fringilla ut. Dapibus ultrices in iaculis nunc sed augue lacus. Dolor sit amet consectetur adipiscing. Egestas quis ipsum suspendisse ultrices. Pharetra sit amet aliquam id diam.</p>
                <p>Diam phasellus vestibulum lorem sed risus ultricies. Fames ac turpis egestas maecenas. Consequat semper viverra nam libero justo laoreet sit amet. Tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada. Urna duis convallis convallis tellus id interdum velit. Integer malesuada nunc vel risus commodo. Etiam dignissim diam quis enim lobortis scelerisque fermentum. Lorem ipsum dolor sit amet consectetur adipiscing elit pellentesque habitant. Nibh cras pulvinar mattis nunc sed. At volutpat diam ut venenatis tellus in metus vulputate eu. Eu augue ut lectus arcu. Aliquam malesuada bibendum arcu vitae elementum curabitur vitae nunc. Tristique magna sit amet purus gravida quis blandit turpis. Elementum integer enim neque volutpat ac. Ante metus dictum at tempor commodo ullamcorper a lacus. Consectetur libero id faucibus nisl tincidunt eget. Parturient montes nascetur ridiculus mus mauris vitae ultricies leo integer. Elit scelerisque mauris pellentesque pulvinar. Et malesuada fames ac turpis egestas integer eget aliquet.</p>',
                'seo_title' => 'Lorem ipsum dolor sit amet',
                'seo_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'descriptionable_id' => 1,
                'descriptionable_type' => 'App\Models\Page',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'language_id' => 2,
                'title' => 'Lorem ipsum dolor sit amet en',
                'slug' => 'lorem-ipsum-dolor-sit-amet-en',
                'sub_title' => 'consectetur adipiscing elit, sed do eiusmod tempor incididunt',
                'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dictum varius duis at consectetur. Tempor nec feugiat nisl pretium fusce id velit ut tortor. Rhoncus dolor purus non enim praesent elementum. Hac habitasse platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper. Viverra mauris in aliquam sem fringilla ut. Dapibus ultrices in iaculis nunc sed augue lacus. Dolor sit amet consectetur adipiscing. Egestas quis ipsum suspendisse ultrices. Pharetra sit amet aliquam id diam.</p>
                <p>Diam phasellus vestibulum lorem sed risus ultricies. Fames ac turpis egestas maecenas. Consequat semper viverra nam libero justo laoreet sit amet. Tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada. Urna duis convallis convallis tellus id interdum velit. Integer malesuada nunc vel risus commodo. Etiam dignissim diam quis enim lobortis scelerisque fermentum. Lorem ipsum dolor sit amet consectetur adipiscing elit pellentesque habitant. Nibh cras pulvinar mattis nunc sed. At volutpat diam ut venenatis tellus in metus vulputate eu. Eu augue ut lectus arcu. Aliquam malesuada bibendum arcu vitae elementum curabitur vitae nunc. Tristique magna sit amet purus gravida quis blandit turpis. Elementum integer enim neque volutpat ac. Ante metus dictum at tempor commodo ullamcorper a lacus. Consectetur libero id faucibus nisl tincidunt eget. Parturient montes nascetur ridiculus mus mauris vitae ultricies leo integer. Elit scelerisque mauris pellentesque pulvinar. Et malesuada fames ac turpis egestas integer eget aliquet.</p>',
                'seo_title' => 'Lorem ipsum dolor sit amet',
                'seo_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'descriptionable_id' => 1,
                'descriptionable_type' => 'App\Models\Page',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        $files = [
            [
                'file_id' => 3,
                'fileable_id' => 1,
                'fileable_type' => 'App\Models\Page',
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
