<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Webpatser\Uuid\Uuid;

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
            'id' => Uuid::generate()->string,
            'nome' => 'Admin',
            'email' => 'cti@cejam.org.br',
            'login' => 'admin',
            'email_verified_at' => now(),
            'password' => Hash::make('cejam2019'),
            'remember_token' => str_random(10),
            'super' => true
        ]);
        //factory(App\Models\User::class, 50)->create();
    }
}
