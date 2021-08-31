<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'role_id' => '1',
                'name' => 'Md.Milton',
                'email' => 'milton2913@gmail.com',
                'mobile' => '01674797580',
                'gender' => 'Male',
                'password' => bcrypt('123456'),
                'verified' => '1',
                'status' => '1',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]
        ];
        DB::table('users')->insert($user);
        $religions = [
            [
                'title' => 'Islam',
                'alias' => 'islam',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]
        ];
        DB::table('religions')->insert($religions);

        $exam_levels = [
            [
                'title' => 'A-D',
                'alias' => 'a-d',
                'status'=>'1',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title' => 'E-F',
                'alias' => 'e-f',
                'status'=>'1',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]
        ];
        DB::table('exam_levels')->insert($exam_levels);


        $profile = [
            [
                'user_id' =>'1',
                'father_name' =>'Late Abdus Sattar',
                'mother_name' =>'Laily Begum',
                'dob' =>'1991-12-31',
                'nationality' =>'Bangladeshi',
                'religion_id' =>'1',
                'identity' =>'20132546584',
                'identity_file' =>'not upload',
                'address' =>'Dhaka-1943,Bangladesh',
                'signature' =>'not upload',
                'avatar' =>'not upload',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]
        ];

        DB::table('profiles')->insert($profile);
    }
}
