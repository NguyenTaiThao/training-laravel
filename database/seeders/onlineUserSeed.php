<?php

namespace Database\Seeders;

use App\Models\OnlineUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class onlineUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OnlineUser::insert(['data_json' => "{}"]);
    }
}