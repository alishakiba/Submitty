<?php

namespace Submitty\Submitty\Controllers;

use Submitty\Submitty\Controllers\Admin\ReportController;
use Submitty\Submitty\Controllers\Admin\GradeableController;
use Submitty\Submitty\Controllers\Admin\GradeablesController;
use Submitty\Submitty\Controllers\Admin\AdminGradeableController;
use Submitty\Submitty\Controllers\Admin\ConfigurationController;
use Submitty\Submitty\Controllers\Admin\UsersController;
use Submitty\Submitty\Controllers\Admin\LateController;
use Submitty\Submitty\Controllers\Admin\PlagiarismController;
use Submitty\Submitty\Libraries\Core;
use Submitty\Submitty\Libraries\Output;
use Submitty\Submitty\Models\User;

class AdminController extends AbstractController {
    public function run() {
        if (!$this->core->getUser()->accessAdmin()) {
            $this->core->getOutput()->showError("This account cannot access admin pages");
        }

        //$this->core->getOutput()->addBreadcrumb('Admin');
        $controller = null;
        switch ($_REQUEST['page']) {
            case 'users':
                $controller = new UsersController($this->core);
                break;
            case 'configuration':
                $this->core->getOutput()->addBreadcrumb('Course Settings');
                $controller = new ConfigurationController($this->core);
                break;
            case 'gradeable':
                $controller = new GradeableController($this->core);
                break;
            case 'late':
                $controller = new LateController($this->core);
                break;
            case 'admin_gradeable':
                $controller = new AdminGradeableController($this->core);
                break;
            case 'reports':
                $this->core->getOutput()->addBreadcrumb('Report');
                $controller = new ReportController($this->core);
                break;
            case 'plagiarism':
                $controller = new PlagiarismController($this->core);
                break;
            default:
                $this->core->getOutput()->showError("Invalid page request for controller ".get_class($this));
                break;
        }
        $controller->run();
    }
}
