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
                    'email'=>'admin@helpinhand.org',
                    'password'=>bcrypt('HelpingHand123!'),
                    'is_active'=>1,
                )
            ));
    }
}
