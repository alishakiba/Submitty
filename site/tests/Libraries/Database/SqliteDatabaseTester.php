<?php

namespace Submitty\Submitty\Libraries\Database;

use PHPUnit\Framework\TestCase;

class SqliteDatabaseTester extends TestCase {
    function testMemorySqliteDSN() {
        $database = new SqliteDatabase(array('memory' => true));
        $this->assertEquals("sqlite::memory:", $database->getDSN());
    }

    public function testPathSqliteDSN() {
        $database = new SqliteDatabase(array('path' => '/tmp/test.sq3'));
        $this->assertEquals("sqlite:/tmp/test.sq3", $database->getDSN());
    }

    /**
     * @expectedException \Submitty\Submitty\Exceptions\NotImplementedException
     */
    public function testFromDatabaseToPHPArray() {
        $database = new SqliteDatabase();
        $database->fromDatabaseToPHPArray("");
    }

    /**
     * @expectedException \Submitty\Submitty\Exceptions\NotImplementedException
     */
    public function testFromPHPToDatabaseArray() {
        $database = new SqliteDatabase();
        $database->fromPHPToDatabaseArray(array());
    }
}
