<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords=[
            ['id'=>'1','name'=>'super admin','type'=>'super admin','vendor_id'=>0,'mobile'=>'01681046437','email'=>'admin@admin.com','password'=>'$2a$12$903hrcVxDyxnnzDbBPGGy.mBiLYvS.6KPwCZ5JT7Nc1o5daP7SB2K','image'=>'','status'=>1]
        ];
        Admin::insert($adminRecords);
    }
}
