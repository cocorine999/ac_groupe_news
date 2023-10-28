<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        DB::table('categories')->insert([
            'name'=>'Science',
            'slug'=>'science'
        ]);
    
        DB::table('categories')->insert([
            'name'=>'Politique',
            'slug'=>'politique'
        ]);
    
        DB::table('categories')->insert([
            'name'=>'Beauté',
            'slug'=>'beauty'
        ]);
    }
}
