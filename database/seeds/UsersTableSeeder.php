<?php

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
                'id' => 1,
                'role_id' => 1,
                'name' => 'Admin',
                'email' => 'fernandbong@gmail.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => '2020-02-09 12:42:53',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'OojgQYDtYSSnl3lKXz1dZDbj7oIbbs9sNKVU3ckgzu8T3P3XpUTadMW4VXHO',
                'settings' => NULL,
                'created_at' => '2020-02-09 12:42:53',
                'updated_at' => '2020-02-11 00:15:23',
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 3,
                'name' => 'customer 1',
                'email' => 'customer@gmail.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$xJacK/k89sSDbvDvqaMnC.KLEHOZr/YhqQMVSrvrTVhjggQgVhzpq',
                'remember_token' => NULL,
                'settings' => '{"locale":"en"}',
                'created_at' => '2020-02-11 00:16:34',
                'updated_at' => '2020-07-20 10:55:59',
            ),
            2 => 
            array (
                'id' => 3,
                'role_id' => 2,
                'name' => 'customer 2',
                'email' => 'customer2@gmail.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$xJacK/k89sSDbvDvqaMnC.KLEHOZr/YhqQMVSrvrTVhjggQgVhzpq',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2020-02-11 00:16:34',
                'updated_at' => '2020-02-11 00:16:34',
            ),
            3 => 
            array (
                'id' => 4,
                'role_id' => 3,
                'name' => 'Fotografer 1',
                'email' => 'fotografer1@gmail.com',
                'avatar' => 'users\\July2020\\lzz0Ofy7OQK9BQkUd6GB.jpg',
                'email_verified_at' => NULL,
                'password' => '$2y$10$xJacK/k89sSDbvDvqaMnC.KLEHOZr/YhqQMVSrvrTVhjggQgVhzpq',
                'remember_token' => NULL,
                'settings' => '{"locale":"en"}',
                'created_at' => '2020-02-11 00:16:34',
                'updated_at' => '2020-07-20 01:45:58',
            ),
            4 => 
            array (
                'id' => 5,
                'role_id' => 3,
                'name' => 'Fotografer 2',
                'email' => 'fotografer2@gmail.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$xJacK/k89sSDbvDvqaMnC.KLEHOZr/YhqQMVSrvrTVhjggQgVhzpq',
                'remember_token' => NULL,
                'settings' => '{"locale":"en"}',
                'created_at' => '2020-02-11 00:16:34',
                'updated_at' => '2020-05-02 05:29:32',
            ),
            5 => 
            array (
                'id' => 6,
                'role_id' => 2,
                'name' => 'custboong',
                'email' => 'cust@gmail.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$waNVrOVqGT/DyVLHAtMjY.VvNrj4RwMuQKspOiGODDEACtjCDNMNq',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2020-05-30 01:30:51',
                'updated_at' => '2020-05-30 01:30:51',
            ),
            6 => 
            array (
                'id' => 7,
                'role_id' => 3,
                'name' => 'fernando2',
                'email' => 'fernando2@gmail.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$fNWlr06cnrrn7QckT3T7B.36U4eTsGa9.hn0HnTtXsjzeu5SpxJ9.',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2020-06-11 09:47:04',
                'updated_at' => '2020-06-11 09:52:16',
            ),
            7 => 
            array (
                'id' => 8,
                'role_id' => 2,
                'name' => 'test',
                'email' => 'test@market.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$TUzYARW92aEoJfYyJc9PpelFis6IJ/ETMFDS8IOqpnyU/RdC0Er5G',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2020-06-21 03:35:46',
                'updated_at' => '2020-06-21 03:35:46',
            ),
            8 => 
            array (
                'id' => 9,
                'role_id' => 2,
                'name' => 'rwqr',
                'email' => 'dasd@gmail.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$OCZqF6JD0JTt8j24vVtTnencHKApyArEwQfgAXCnVRJTnuQkzcuwG',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2020-06-23 00:36:29',
                'updated_at' => '2020-06-23 00:36:29',
            ),
            9 => 
            array (
                'id' => 10,
                'role_id' => 2,
                'name' => 'buwung',
                'email' => 'burungpuyuh@gmail.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$TtSZaWL96UP1NtKco2o6WO4xUOJpnA4cnL/y6bkoDrtXG4fEXnJC6',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2020-07-15 03:45:50',
                'updated_at' => '2020-07-15 03:45:50',
            ),
            10 => 
            array (
                'id' => 11,
                'role_id' => 2,
                'name' => 'fernando',
                'email' => 'fernandbong2@gmail.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$TpX9QEh7EQ/R9SPht7bfWeVzvo8DRX2dhRjtRLRYQ0fZ1zD6HIWbu',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2020-07-20 10:47:21',
                'updated_at' => '2020-07-20 10:47:21',
            ),
        ));
        
        
    }
}