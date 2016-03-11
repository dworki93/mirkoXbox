<?php

use Illuminate\Database\Seeder;

class PlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $platforms = array('xone', 'x360', 'ps3', 'ps4', 'pc');
        for($i = 0; $i < 20; $i++)
            DB::table('platforms')->insert([
                'user_id' => $i + 1,
                'active' => 1,
                'platformNick' => str_random(10),
                'games' => str_random(100),
                'description' => str_random(100),
                'platform' => $platforms[rand(0, 4)]
            ]);
    }
}
