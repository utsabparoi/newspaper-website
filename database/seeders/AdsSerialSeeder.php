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
            array('id' => '1','serial_name' => 'Header Right','status' => '1','created_at' => '2023-02-06 16:55:00','updated_at' => NULL),
            array('id' => '2','serial_name' => 'Page Content1','status' => '1','created_at' => '2023-02-06 16:55:24','updated_at' => NULL),
            array('id' => '3','serial_name' => 'Page Content2','status' => '1','created_at' => '2023-02-06 16:55:38','updated_at' => NULL),
            array('id' => '4','serial_name' => 'Page Content3','status' => '1','created_at' => '2023-02-06 16:55:48','updated_at' => NULL),
            array('id' => '5','serial_name' => 'Page Content4','status' => '1','created_at' => '2023-02-06 16:55:58','updated_at' => NULL),
            array('id' => '6','serial_name' => 'Right Sidebar1','status' => '1','created_at' => '2023-02-06 16:56:09','updated_at' => NULL),
            array('id' => '7','serial_name' => 'Right Sidebar2','status' => '1','created_at' => '2023-02-06 16:56:17','updated_at' => NULL),
            array('id' => '8','serial_name' => 'Right Sidebar2','status' => '1','created_at' => '2023-02-06 16:56:25','updated_at' => NULL),
            array('id' => '9','serial_name' => 'Page Content4','status' => '1','created_at' => '2023-02-06 16:56:34','updated_at' => NULL),
            array('id' => '10','serial_name' => 'Footer Top','status' => '1','created_at' => '2023-02-06 16:56:41','updated_at' => NULL)
        );

        foreach ($ads_serials as $item) {
            AdsSerial::firstOrCreate(
                [ 'id'                => $item['id'] ],
                [
                    'serial_name'   => $item['serial_name'],
                    'status'          => $item['status'],
                ]
            );
        }
    }
}
