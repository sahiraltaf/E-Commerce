<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','admin@gmail.com')->first();
        if(!$user){
            $user = new User();
        }
        $user->name  = 'admin';
        $user->email = 'admin@gmail.com';
        $user->role  =  1;
        $user->password = Hash::make('admin123');
        $user->save();
    }
}
