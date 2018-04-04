<?php

namespace Submitty\Submitty\Libraries;

use PHPUnit\Framework\TestCase;

class IniParserTester extends TestCase {
    /**
     * @expectedException \Submitty\Submitty\Exceptions\FileNotFoundException
     * @expectedExceptionMessage Could not find ini file to parse: invalid_file
     */
    public function testNonExistFile() {
        IniParser::readFile("invalid_file");
    }
}
