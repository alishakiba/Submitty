<?php

namespace Submitty\Submitty\Controllers;

use Submitty\Submitty\Controllers\Grading\ElectronicGraderController;
use Submitty\Submitty\Controllers\Grading\SimpleGraderController;
use Submitty\Submitty\Controllers\Grading\TeamListController;


class GradingController extends AbstractController {
    
    public function run() {
        $controller = null;
        switch ($_REQUEST['page']) {
            case 'simple':
                $controller = new SimpleGraderController($this->core);
                break;
            case 'electronic':
                $controller = new ElectronicGraderController($this->core);
                break;
            default:
                $this->core->getOutput()->showError("Invalid page request for controller ".get_class($this));
                break;
        }
        $controller->run();
    }
}
