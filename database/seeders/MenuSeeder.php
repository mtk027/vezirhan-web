<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuItem;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::truncate();
        MenuItem::truncate();

        $menus = [
            [
                'title' => 'Manşet Menü',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Açılır Menü',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        $menus_items = [
            [
                'language_id' => 1,
                'parent_id' => null,
                'menu_id' => 1,
                'title' => 'Anasayfa',
                'active' => null,
                'type' => 0,
                'value' => '/',
                'target' => '_self',
                'row_number' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'language_id' => 1,
                'parent_id' => null,
                'menu_id' => 1,
                'title' => 'Hakkımızda',
                'active' => null,
                'type' => 0,
                'value' => '/#about_us',
                'target' => '_self',
                'row_number' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'language_id' => 1,
                'parent_id' => null,
                'menu_id' => 1,
                'title' => 'Menü',
                'type' => 0,
                'value' => 'https://qrlim.com/LULULNG/1001',
                'target' => '_blank',
                'row_number' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'language_id' => 1,
                'parent_id' => null,
                'menu_id' => 1,
                'title' => 'Şubelerimiz',
                'active' => 'branches',
                'type' => 2,
                'value' => 2,
                'target' => '_self',
                'row_number' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'language_id' => 1,
                'parent_id' => null,
                'menu_id' => 1,
                'title' => 'Galeri',
                'active' => 'galleries',
                'type' => 2,
                'value' => 3,
                'target' => '_self',
                'row_number' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'language_id' => 1,
                'parent_id' => null,
                'menu_id' => 1,
                'title' => 'İletişim',
                'active' => 'contact',
                'type' => 2,
                'value' => 1,
                'row_number' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'language_id' => 1,
                'parent_id' => null,
                'menu_id' => 2,
                'title' => 'Anasayfa',
                'active' => null,
                'type' => 0,
                'value' => '/',
                'target' => '_self',
                'row_number' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'language_id' => 1,
                'parent_id' => null,
                'menu_id' => 2,
                'title' => 'Hakkımızda',
                'active' => null,
                'type' => 0,
                'value' => '/#about_us',
                'target' => '_self',
                'row_number' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'language_id' => 1,
                'parent_id' => null,
                'menu_id' => 2,
                'title' => 'Menü',
                'type' => 0,
                'value' => 'https://qrlim.com/LULULNG/1001',
                'target' => '_blank',
                'row_number' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'language_id' => 1,
                'parent_id' => null,
                'menu_id' => 2,
                'title' => 'Şubelerimiz',
                'active' => 'branches',
                'type' => 2,
                'value' => 2,
                'target' => '_self',
                'row_number' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'language_id' => 1,
                'parent_id' => null,
                'menu_id' => 2,
                'title' => 'İletişim',
                'active' => 'contact',
                'type' => 2,
                'value' => 1,
                'row_number' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'language_id' => 2,
                'parent_id' => null,
                'menu_id' => 1,
                'title' => 'Homepage',
                'active' => null,
                'type' => 0,
                'value' => '/',
                'target' => '_self',
                'row_number' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'language_id' => 2,
                'parent_id' => null,
                'menu_id' => 1,
                'title' => 'About Us',
                'active' => null,
                'type' => 0,
                'value' => '/#about_us',
                'target' => '_self',
                'row_number' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'language_id' => 2,
                'parent_id' => null,
                'menu_id' => 1,
                'title' => 'Menu',
                'type' => 0,
                'value' => 'https://qrlim.com/LULULNG/1001',
                'target' => '_blank',
                'row_number' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'language_id' => 2,
                'parent_id' => null,
                'menu_id' => 1,
                'title' => 'Branches',
                'active' => 'branches',
                'type' => 2,
                'value' => 2,
                'target' => '_self',
                'row_number' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'language_id' => 2,
                'parent_id' => null,
                'menu_id' => 1,
                'title' => 'Gallery',
                'active' => 'galleries',
                'type' => 2,
                'value' => 3,
                'target' => '_self',
                'row_number' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'language_id' => 2,
                'parent_id' => null,
                'menu_id' => 1,
                'title' => 'Contact',
                'active' => 'contact',
                'type' => 2,
                'value' => 1,
                'row_number' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        foreach ($menus as $item) {
            Menu::insert($item);
        }
        foreach ($menus_items as $menu_item) {
            MenuItem::insert($menu_item);
        }
    }
}
