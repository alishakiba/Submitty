<?php

namespace Submitty\Submitty\Exceptions;

use PHPUnit\Framework\TestCase;

class DatabaseExceptionTester extends TestCase {
    public function testDatabaseExceptionNoQuery() {
        try {
            throw new DatabaseException("exception");
        }
        catch (DatabaseException $exc) {
            $this->assertEquals("exception", $exc->getMessage());
            $this->assertEmpty($exc->getDetails());
        }
    }

    public function testDatabaseExceptionQuery() {
        try {
            throw new DatabaseException("exception", "query", array('parameters'));
        }
        catch (DatabaseException $exc) {
            $this->assertEquals("exception", $exc->getMessage());
            $this->assertEquals(array('query' => "query", "parameters" => array('parameters')), $exc->getDetails());
        }
    }
}
