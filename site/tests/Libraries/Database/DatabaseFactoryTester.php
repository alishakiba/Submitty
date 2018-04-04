<?php

namespace Submitty\Submitty\Libraries\Database;

use Submitty\Submitty\BaseUnitTest;

class DatabaseFactoryTester extends BaseUnitTest {
    public function postgresqlDrivers() {
        return array(
            array('pgsql'),
            array('postgresql'),
            array('postgres')
        );
    }

    /**
     * @param string $driver
     * @dataProvider postgresqlDrivers
     */
    public function testDatabaseFactoryPostgresql($driver) {
        $factory = new DatabaseFactory($driver);
        $this->assertInstanceOf(PostgresqlDatabase::class, $factory->getDatabase(array()));
        /** @noinspection PhpParamsInspection */
        $this->assertInstanceOf(PostgresqlDatabaseQueries::class, $factory->getQueries($this->createMockCore()));
    }

    public function testDatabaseFactorySqlite() {
        $factory = new DatabaseFactory('sqlite');
        $this->assertInstanceOf(SqliteDatabase::class, $factory->getDatabase(array()));
        /** @noinspection PhpParamsInspection */
        $this->assertInstanceOf(DatabaseQueries::class, $factory->getQueries($this->createMockCore()));
    }

    /**
     * @expectedException \Submitty\Submitty\Exceptions\NotImplementedException
     * @expectedExceptionMessage Database not implemented for driver: invalid
     */
    public function testDatabaseFactoryInvalid() {
         $factory = new DatabaseFactory('invalid');
         $factory->getDatabase(array());
    }
}
