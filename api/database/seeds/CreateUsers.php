<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CreateUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => Str::random(10),
            'lastname' => Str::random(10),
            'school' => Str::random(10),
            'task' => Str::random(30),
        ]);
    }
}
