<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ],
            [
                'user_id' => 1,
                'directory_name' => 'Ruby',
            ]
        ]);
    }
}
