<?php

namespace Database\Seeders;

use App\Models\SystemPage;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SystemPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SystemPage::truncate();
        $items = [[
            'title' => 'İletişim',
            'route_name' => 'contact',
            'controller' => 'App\Http\Controllers\Frontend\ContactController',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ], [
            'title' => 'Şubeler',
            'route_name' => 'branches',
            'controller' => 'App\Http\Controllers\Frontend\BranchesPageController',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ], [
            'title' => 'Galeri',
            'route_name' => 'galleries',
            'controller' => 'App\Http\Controllers\Frontend\GalleryController',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]];

        foreach ($items as $data) {
            SystemPage::insert($data);
        }
    }
}
