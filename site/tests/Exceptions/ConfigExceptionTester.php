<?php

namespace Submitty\Submitty\Exceptions;

use PHPUnit\Framework\TestCase;

class ConfigExceptionTester extends TestCase  {
    public function testConfigException() {
        try {
            throw new ConfigException("exception");
        }
        catch (ConfigException $exc) {
            $this->assertEquals("exception", $exc->getMessage());
            $this->assertEmpty($exc->getDetails());
            $this->assertTrue($exc->displayMessage());
            $this->assertFalse($exc->logException());
        }
    }

    public function testConfigExceptionShowMessage() {
        try {
            throw new ConfigException("exception", false);
        }
        catch (ConfigException $exc) {
            $this->assertEquals("exception", $exc->getMessage());
            $this->assertEmpty($exc->getDetails());
            $this->assertFalse($exc->displayMessage());
            $this->assertTrue($exc->logException());
        }
    }
}
