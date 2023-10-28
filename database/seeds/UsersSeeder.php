<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name'=>'MD.User',
            'username'=>'user',
            'phone'=>99000090,
            'role_id'=>1,
            'image'=>'storage/avatar/avatar.png',
            'email'=>'user@gmail.com',
            'password'=>Hash::make('99000090'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name'=>'MD.Blogger',
            'username'=>'blogger',
            'phone'=>97000000,
            'role_id'=>2,
            'image'=>'storage/avatar/avatar.png',
            'email'=>'blogger@gmail.com',
            'password'=>Hash::make('97000000'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name'=>'MD.Admin',
            'username'=>'admin',
            'phone'=>62004867,
            'role_id'=>3,
            'image'=>'storage/avatar/avatar.png',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('62004867'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);

        /**
         * N°	Nom	        Nombre de post	Créer le	            Image	Action
            1	NUMÉRIQUE	0	            2021-11-23 16:34:43		        edit  |   delete
            2	MUSIQUE	    0	            2021-11-23 16:34:07		        edit  |   delete
            3	RECRUTEMENT	0	            2021-11-23 16:33:51		        edit  |   delete
         */

    }
}
