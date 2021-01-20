<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SettingsStores extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings_stores')->insert([
            'status' => 1,
            'api_key' => '',
            'center_lng' => '',
            'center_lat' => '',
            'initial_zoom' => '2',
            'search_result_zoom' => '2',
            'detail_zoom' => '2',
            'radius_unit' => '1',
            'max' => '100',
            'temp_email' => '<p>Name:{{name}}</p><p>Email:{{email}}</p><p>Phone-No:{{phone}}</p><p>Content:{{content}}</p>',
        ]);
    }
}