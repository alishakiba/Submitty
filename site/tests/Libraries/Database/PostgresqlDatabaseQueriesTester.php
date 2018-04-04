<?php

namespace Submitty\Submitty\Libraries\Database;

use PHPUnit\Framework\TestCase;

class PostgresqlDatabaseQueriesTester extends TestCase {
    /**
     * Test to ensure that there are no public functions defined for Postgresql that
     * are not defined in the generic DatabaseQueries function.
     */
    public function testPublicFunctions() {
        $filter = function($name) { return $name !== '__construct'; };
        $expected = array_filter(get_class_methods(DatabaseQueries::class), $filter);
        sort($expected);
        $actual = array_filter(get_class_methods(PostgresqlDatabaseQueries::class), $filter);
        sort($actual);
        $this->assertEquals($expected, $actual);
    }
}
