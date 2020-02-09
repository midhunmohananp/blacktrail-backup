<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;   

class MercuriusUsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        // Seed Mercurius Demo Users
        //
        $this->createUser('Ian Fox', 'ian@launcher.host', 'avatar_ian.png');
        $this->createUser('Noa Robison', 'noa@launcher.host', 'avatar_noa.png');
        $this->createUser('Lua Adison', 'lua@launcher.host', 'avatar_lua.png');

        // Seed dummy users to test Conversations scroll
        //
        factory(config('mercurius.models.user'), 20)->create([
            'is_online'   => array_rand([true, false]),
            'be_notified' => array_rand([true, false]),
        ]);

    }

    /**
     * Insert single User.
     *
     * @param string $name
     * @param string $email
     */
    private function createUser($name, $email, $avatar)
    {
        $faker = \Faker\Factory::create();

        config('mercurius.models.user')::firstOrCreate([
            'email' => $email,
        ], [
            'display_name'   => $name,
            'role_id'        => mt_rand(1,3),  
            'username'       => $faker->userName,
            'email'          => $faker->unique()->safeEmail,
        'password'       => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'country_id'     => DB::table('countries')->get()->random()->id,
        'role_id'        => mt_rand(1,3),      
        'avatar'         => 'vendor/mercurius/img/avatar/'.$avatar,
        'password'       => bcrypt('password'),
        'remember_token' => null,
    ]);
        
    }

}
