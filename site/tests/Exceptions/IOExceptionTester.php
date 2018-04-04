<?php

namespace Submitty\Submitty\Exceptions;

use PHPUnit\Framework\TestCase;

class IOExceptionTester extends TestCase {
    public function testIOException() {
        try {
            throw new IOException("exception");
        }
        catch (IOException $exc) {
            $this->assertEquals("exception", $exc->getMessage());
            $this->assertEmpty($exc->getDetails());
        }
    }
}
