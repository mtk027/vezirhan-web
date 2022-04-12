<?php

namespace Database\Seeders;

use App\Models\Description;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Description::truncate();
        DB::table('fileables')->truncate();

        $this->call([
            UserSeeder::class,
            LanguageSeeder::class,
            SliderSeeder::class,
            FileSeeder::class,
            SettingSeeder::class,
            MenuSeeder::class,
            HomepageBlockSeeder::class,
            BranchSeeder::class,
            SystemPageSeeder::class,
            PropertySeeder::class,
            HappyCustomerSeeder::class,
        ]);


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
