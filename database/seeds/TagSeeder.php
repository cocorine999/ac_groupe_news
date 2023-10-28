<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'name'=>'Mort',
            'slug'=>'mort'
        ]);

        DB::table('tags')->insert([
            'name'=>'Virus',
            'slug'=>'virus'
        ]);

        DB::table('tags')->insert([
            'name'=>'Corona',
            'slug'=>'corona'
        ]);
    }
}
