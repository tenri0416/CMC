<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DirectorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('directories')->insert([
            [

                'user_id' => 1,
                'directory_name' => 'Laravel',
                'created_at' =>new Carbon(),
                'updated_at' =>new Carbon(),
            ],
            [
                'user_id' => 1,
                'directory_name' => 'Ruby',
                'created_at' =>new Carbon(),
                'updated_at' =>new Carbon(),
            ]
        ]);
    }
}
