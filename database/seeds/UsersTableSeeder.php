<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 20; $i++)
            DB::table('users')->insert([
                'wykopNick' => str_random(10),
                'avatar' => 'http://xf.cdn02.imgwykop.pl/c3397992/Dworki_fKycZ1hKiX,q60.jpg',
                'age' => rand(15,50)
            ]);
    }
}
