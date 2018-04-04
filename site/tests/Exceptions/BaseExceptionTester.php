<?php

namespace Submitty\Submitty\Exceptions;

use PHPUnit\Framework\TestCase;

class BaseExceptionTester extends TestCase {
    public function testException() {
        try {
            throw new BaseException("Some exception", "Details string");
        }
        catch (BaseException $exc) {
            $this->assertTrue($exc->logException());
            $this->assertFalse($exc->displayMessage());
            $this->assertEquals(array("extra_details" => "Details string"), $exc->getDetails());
        }
    }
}
