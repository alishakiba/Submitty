<?php

namespace Submitty\Submitty\Controllers;

use Submitty\Submitty\Libraries\Core;
use Submitty\Submitty\Models\GradeableList;
use Submitty\Submitty\Models\ClassJson;

class StudentController extends AbstractController {
    public function run() {
        $controller = null;
        switch ($_REQUEST['page']) {
            case 'rainbow':
                $controller = new Student\RainbowGradesController($this->core);
                break;
            case 'team':
                $controller = new Student\TeamController($this->core);
                break;
            case 'submission':
            default:
                $controller = new Student\SubmissionController($this->core);
                break;
        }

        $controller->run();
    }
}
