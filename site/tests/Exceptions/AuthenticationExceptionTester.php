<?php

namespace Submitty\Submitty\Exceptions;

use PHPUnit\Framework\TestCase;

class AuthenticationExceptionTester extends TestCase {
    public function testAuthenticationException() {
        try {
            throw new AuthenticationException("exception");
        }
        catch (AuthenticationException $exc) {
            $this->assertEquals("exception", $exc->getMessage());
            $this->assertEmpty($exc->getDetails());
        }
    }
}
