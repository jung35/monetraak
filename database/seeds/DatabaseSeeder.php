<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use MoneTraak\User;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('UserTableSeeder');
    }

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'email'    => 'test@test.test',
            'password' => bcrypt('test'),
            'name'     => 'test'
        ));
    }

}