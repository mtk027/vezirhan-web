<?php

namespace Database\Seeders;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Role::truncate();
        $data = [
            [
                'title' => "Admin",
                'slug' => "admin",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => "İnsan Kaynakları",
                'slug' => "insan-kaynaklari",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => "İçerik Editörü",
                'slug' => "icerik-editoru",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];
        foreach ($data as $item) {
            Role::insert($item);
        }
    }
}
