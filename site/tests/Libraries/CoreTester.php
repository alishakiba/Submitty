<?php

namespace Submitty\Submitty\Libraries;

use PHPUnit\Framework\TestCase;

class CoreTester extends TestCase {

    /**
     * This function should always return false unless we've mocked it so that we can bypass something that
     * is a huge pain to otherwise get around (generally writing tests in phpt).
     */
    public function testIsTesting() {
        $core = new Core();
        $this->assertFalse($core->isTesting());
    }

    /**
     * @expectedException \Exception
     */
    public function testErrorDatabaseBeforeConfig() {
        $core = new Core();
        $core->loadDatabases();
    }
}
