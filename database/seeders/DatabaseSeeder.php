<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdsPosition;
use App\Models\AdsManagement;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            AboutCompanyTableSeeder::class,
            AdsManagementSeeder::class,
            AdsPositionSeeder::class,
            AdsSerialSeeder::class,
        ]);

    }

}
