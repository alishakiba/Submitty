<?php

namespace Submitty\Submitty\Exceptions;

use PHPUnit\Framework\TestCase;

class NotImplementedExceptionTester extends TestCase {
    public function testNotImplementedExceptionMessage() {
        try {
            throw new NotImplementedException("exception");
        }
        catch (NotImplementedException $exc) {
            $this->assertEquals("exception", $exc->getMessage());
        }
    }

    public function testNotImplementedExceptionNoMessage() {
        try {
            throw new NotImplementedException();
        }
        catch (NotImplementedException $exc) {
            $this->assertEquals("This is not implemented yet.", $exc->getMessage());
        }
    }
}
