<?php

use \MoneTraak\Models\User;
use \Auth;

class RouteTest extends TestCase {

    protected $user;

    public function testNoAuth()
    {
        $this->assertFalse(Auth::check());

        //Index
        $this->call('GET', '/');
        $this->assertRedirectedTo('/auth/login');

        $this->call('GET', '/auth/login');
        $this->assertResponseOk();

        $this->call('GET', '/auth/register');
        $this->assertResponseOk();
    }

    public function testAuth()
    {
        $user = new User([
            'email'    => 'test@test.test',
            'password' => bcrypt('test'),
            'name'     => 'test'
        ]);

        $this->be($user);

        $this->assertTrue(Auth::check());
    }

}
