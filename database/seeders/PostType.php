<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_types')->insert(['name_type' => 'Teks']);
        DB::table('post_types')->insert(['name_type' => 'Heading']);
        DB::table('post_types')->insert(['name_type' => 'Image']);
        DB::table('post_types')->insert(['name_type' => 'Link']);
        DB::table('post_types')->insert(['name_type' => 'Video']);
        DB::table('post_types')->insert(['name_type' => 'List']);
    }
}
