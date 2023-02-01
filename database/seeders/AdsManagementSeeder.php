<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdsManagement;

class AdsManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $all_ads = array(
            array('id' => '1', 'script' => '', 'position_id' => '1' , 'serial_num' => '1', 'status' => 1),
            array('id' => '2', 'script' => '', 'position_id' => '1' , 'serial_num' => '2', 'status' => 1),
            array('id' => '3', 'script' => '', 'position_id' => '1' , 'serial_num' => '3', 'status' => 1),
            array('id' => '4', 'script' => '', 'position_id' => '1' , 'serial_num' => '4', 'status' => 1),
            array('id' => '5', 'script' => '', 'position_id' => '1' , 'serial_num' => '5', 'status' => 1),
            array('id' => '6', 'script' => '', 'position_id' => '1' , 'serial_num' => '6', 'status' => 1),
            array('id' => '7', 'script' => '', 'position_id' => '1' , 'serial_num' => '7', 'status' => 1),
            array('id' => '8', 'script' => '', 'position_id' => '1' , 'serial_num' => '8', 'status' => 1),
            array('id' => '9', 'script' => '', 'position_id' => '1' , 'serial_num' => '9', 'status' => 1),
            array('id' => '10', 'script' => '', 'position_id' => '1' , 'serial_num' => '10', 'status' => 1),
            array('id' => '11', 'script' => '', 'position_id' => '1' , 'serial_num' => '11', 'status' => 1),


        );

        foreach ($all_ads as $key => $item) {
            AdsManagement::firstOrCreate(
                [ 'id'                => $item['id'] ],
                [
                    'title'           => $item['title'],
                    'description'     => $item['description'],
                    'icon'            => $item['icon'],
                    'image'           => $item['image'],
                    'status'          => $item['status'],
                ]
            );
        }
    }
}
