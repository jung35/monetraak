<?php

use \MoneTraak\Models\User;
use \Auth;

class MoneyViewControllerTest extends TestCase {

    public function setUp() {
        parent::setUp();

        $user = new User([
            'email'    => 'test@test.test',
            'password' => bcrypt('test'),
            'name'     => 'test'
        ]);

        $this->be($user);

        $this->assertTrue(Auth::check());
    }

    public function testViewWithNoData()
    {
        $this->call('GET', 'money');
        $this->assertResponseOk();
    }

    public function testViewWithId()
    {
        $this->call('GET', 'money/1');
        $this->assertResponseOk();
    }

    public function testViewWithCreate()
    {
        $this->call('GET', 'money/create');
        $this->assertResponseOk();
    }

}