<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\AdsSerial;

class AdsSerialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ads_serials = array(
            array('id' => '1','serial_name' => 'Header 1','status' => '1','created_at' => '2023-02-13 12:27:39','updated_at' => '2023-02-13 12:28:03'),
            array('id' => '2','serial_name' => 'Header 2','status' => '1','created_at' => '2023-02-13 12:27:39','updated_at' => '2023-02-13 12:28:13'),
            array('id' => '3','serial_name' => 'Page Content 1','status' => '1','created_at' => '2023-02-13 12:27:39','updated_at' => '2023-02-13 12:28:26'),
            array('id' => '4','serial_name' => 'Page Content 2','status' => '1','created_at' => '2023-02-13 12:27:39','updated_at' => '2023-02-13 12:28:41'),
            array('id' => '5','serial_name' => 'Page Content 3','status' => '1','created_at' => '2023-02-13 12:27:39','updated_at' => '2023-02-13 12:29:05'),
            array('id' => '6','serial_name' => 'Page Section 1','status' => '1','created_at' => '2023-02-13 12:27:39','updated_at' => '2023-02-13 12:49:59'),
            array('id' => '7','serial_name' => 'Bottom of the Facebook Page','status' => '1','created_at' => '2023-02-13 12:27:39','updated_at' => '2023-02-13 12:50:15'),
            array('id' => '8','serial_name' => 'Bottom of the Right Sidebar','status' => '1','created_at' => '2023-02-13 12:27:39','updated_at' => '2023-02-13 12:50:27'),
            array('id' => '9','serial_name' => 'Page Section 2','status' => '1','created_at' => '2023-02-13 12:27:39','updated_at' => '2023-02-13 12:50:43'),
            array('id' => '10','serial_name' => 'Footer Top','status' => '1','created_at' => '2023-02-13 12:27:39','updated_at' => '2023-02-13 12:27:39'),
            array('id' => '11','serial_name' => 'Extra Serial','status' => '1','created_at' => '2023-02-13 12:51:13','updated_at' => NULL)
        );

        foreach ($ads_serials as $item) {
            AdsSerial::firstOrCreate(
                [ 'id'                => $item['id'] ],
                [
                    'serial_name'     => $item['serial_name'],
                    'status'          => $item['status'],
                ]
            );
        }
    }
}
