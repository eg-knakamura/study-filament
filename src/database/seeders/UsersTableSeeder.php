<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'created_at' => '2023-10-20 02:16:04',
                'email' => 'admin@egstock.co.jp',
                'email_verified_at' => NULL,
                'id' => 1,
                'name' => 'admin',
                'password' => '$2y$10$JSVj95aCIMPJqZJXDiHzDe9YZP8Sj9MI6uW15WCm5q0/gjT.dU7ca',
                'remember_token' => NULL,
                'updated_at' => '2023-10-20 02:16:04',
            ),
        ));
        
        
    }
}