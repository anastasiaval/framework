<?php

use src\Sanitizer;
use PHPUnit\Framework\TestCase;

class SanitizerTest extends TestCase {

    public function integerProvider() {
        return [
            ['10', 10],
            ['a10', 10],
            ['1_0', 10],
            ['10#', 10],
            ['#10#', 10],
        ];
    }

    public function emailProvider() {
        return [
            ['jo#hn@doe.com', false],
            ['john@doe.com', true],
        ];
    }

    /**
     * @dataProvider integerProvider
     */
    public function testInteger($input, $result) {
        $this->assertEquals($result, Sanitizer::integer($input));
    }

    /**
     * @dataProvider emailProvider
     */
    public function testIsEmail($email, $expected) {
        $this->assertEquals($expected, Sanitizer::isEmail($email));
    }
}

