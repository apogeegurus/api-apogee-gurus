<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::query()->create([
           'name' => 'Aram',
           'email' => 'aramsahakyan2208@gmail.com',
           'password' => Hash::make('secret'),
       ]);
    }


}