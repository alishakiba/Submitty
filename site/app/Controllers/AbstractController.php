<?php

namespace Submitty\Submitty\Controllers;

use Submitty\Submitty\Libraries\Core;

abstract class AbstractController {

    /** @var Core  */
    protected $core;

    public function __construct(Core $core) {
        $this->core = $core;
    }

    abstract public function run();
}
