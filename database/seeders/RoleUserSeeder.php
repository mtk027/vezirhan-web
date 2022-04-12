<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->truncate();
        $data = [
            [
                'user_id' => 1,
                'role_id' => 1
            ],
        ];
        foreach ($data as $item) {
            DB::table('role_user')->insert($item);
        }
    }
}
