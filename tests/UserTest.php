<?php

use src\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {

    protected $user;

    protected function setUp() {
        $this->user = new User();
    }

    public function emailProvider() {
        return [
            ['jo#hn@doe.com', 'john@doe.com'],
            ['john@do_e.com', 'john@doe.com'],
            ['john@doe.1com', 'john@doe.com'],
            ['jo-hn@doe.com', 'john@doe.com'],
        ];
    }

    /**
     * @dataProvider emailProvider
     */
    public function testSetEmail($email, $expected) {
        $this->user->setEmail($email);

        $this->assertEquals($expected, $this->user->email);
    }

    protected function tearDown() {
        $this->user = null;
    }
}

