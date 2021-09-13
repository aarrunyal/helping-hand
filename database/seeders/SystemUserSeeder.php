<?php

use Illuminate\Database\Seeder;

class SystemUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('system_users')->delete();
        DB::table('system_users')->insert(
            array(
                array(
                    'first_name' => 'Super',
                    'last_name' => 'Admin',
                    'user_name'=>'helping-hand',
                    'email'=>'admin@doc.com',
                    'password'=>bcrypt('doc123'),
                    'user_type'=> 'admin',
                    'is_active'=>1,
                )
            ));
        DB::table('system_users')->insert(
                array(
                    array(
                        'first_name' => 'teacher',
                        'last_name' => 'teacher',
                        'user_name'=>'teacher',
                        'email'=>'teacher@doc.com',
                        'password'=>bcrypt('teacher123'),
                        'user_type'=> 'teacher',
                        'is_active'=>1,
                    )
                ));
        DB::table('system_users')->insert(
                array(
                    array(
                        'first_name' => 'student',
                        'last_name' => 'student',
                        'user_name'=>'student',
                        'email'=>'student@doc.com',
                        'password'=>bcrypt('student123'),
                        'user_type'=> 'student',
                        'is_active'=>1,
                    )
                ));
    }
}
