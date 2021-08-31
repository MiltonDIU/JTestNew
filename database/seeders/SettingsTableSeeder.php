<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;
class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'user_id' => '1',
                'logo' => 'Apps',
                'title' => 'Title of your Company',
                'meta_keyword' => 'Type of your Company keyword',
                'meta_description' => 'Type of your Company Description',
                'copyright' => 'Type of your Company Copyright',
                'powered' => 'Type of your Company Powered',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]

        ];
        DB::table('settings')->insert($settings);
    }
}
