<?php

namespace Submitty\Submitty\Exceptions;

use PHPUnit\Framework\TestCase;

class IniExceptionTester extends TestCase {
    public function testIniException() {
        try {
            throw new IniException("exception");
        }
        catch (IniException $exc) {
            $this->assertEquals("exception", $exc->getMessage());
            $this->assertEmpty($exc->getDetails());
        }
    }
}
