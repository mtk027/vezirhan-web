<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name' => "Vezirhan",
            'surname' => "Emirgan Bosphorus",
            'avatar' => "/uploads/user.jpg",
            'email' => "destek@limonist.com",
            'phone' => "01234567890",
            'password' => bcrypt("Limonist123"),
            'city_id' => 27,
            'open_udid' => "udid",
            'lat' => "32.1213",
            'lng' => "32.1213",
        ]);

        Auth::login(User::find(1));
        
    }
}
