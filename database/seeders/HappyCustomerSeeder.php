<?php

namespace Database\Seeders;

use App\Models\Description;
use App\Models\HappyCustomer;
use App\Models\Language;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HappyCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HappyCustomer::truncate();
        HappyCustomer::create([
            'location' => 'Newyork, USA',
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        HappyCustomer::create([
            'location' => 'Newyork, USA',
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $descriptions = [
            [
                'language_id' => 1,
                'title' => 'David Gover',
                'slug' => 'david-gover',
                'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in velit dolor.Vivamus gravida, neque nec interdum cursus, erat ligula porta nibh.',
                'descriptionable_id' => 1,
                'descriptionable_type' => 'App\Models\HappyCustomer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'language_id' => 2,
                'title' => 'David Gover',
                'slug' => 'david-gover',
                'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in velit dolor.Vivamus gravida, neque nec interdum cursus, erat ligula porta nibh.',
                'descriptionable_id' => 1,
                'descriptionable_type' => 'App\Models\HappyCustomer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'language_id' => 1,
                'title' => 'John Stone',
                'slug' => 'john-stone',
                'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in velit dolor.Vivamus gravida, neque nec interdum cursus, erat ligula porta nibh.',
                'descriptionable_id' => 2,
                'descriptionable_type' => 'App\Models\HappyCustomer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'language_id' => 2,
                'title' => 'John Stone',
                'slug' => 'john-stone',
                'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in velit dolor.Vivamus gravida, neque nec interdum cursus, erat ligula porta nibh.',
                'descriptionable_id' => 2,
                'descriptionable_type' => 'App\Models\HappyCustomer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        $files = [
            [
                'file_id' => 19,
                'fileable_id' => 1,
                'fileable_type' => 'App\Models\Customer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'file_id' => 19,
                'fileable_id' => 2,
                'fileable_type' => 'App\Models\Customer',
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
