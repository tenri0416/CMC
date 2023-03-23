<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('memos')->insert([
            [

                'directory_id' => 1,
                'title' => 'Laravelとは',
                'content' => '特になし特になし特にない',
                'created_at' =>new Carbon(),
            ],
            [

                'directory_id' => 1,
                'title' => ' Laravel概要',
                'content' => '特になし特になし特にない',
                'created_at' =>new Carbon(),
            ],
            [

                'directory_id' => 2,
                'title' => ' Rubyとは',
                'content' => '特になし特になし特にない',
                'created_at' =>new Carbon(),
            ],
        ]);
    }
}
