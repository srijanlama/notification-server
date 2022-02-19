<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'name' => 'Sujan Lama',
                'email' => 'sujan@example.com',
                'password' => bcrypt('password'),
                'created_at' => Carbon::now()
            ]
        ];

        DB::table('admins')->truncate();
        DB::table('admins')->insert($admins);
    }
}
