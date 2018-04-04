<?php

namespace Submitty\Submitty\Controllers;

use Submitty\Submitty\Controllers\AbstractController;
use Submitty\Submitty\Libraries\Core;
use Submitty\Submitty\Libraries\DateUtils;
use Submitty\Submitty\Libraries\ErrorMessages;
use Submitty\Submitty\Libraries\FileUtils;
use Submitty\Submitty\Libraries\GradeableType;
use Submitty\Submitty\Libraries\Logger;
use Submitty\Submitty\Libraries\Utils;
use Submitty\Submitty\Models\Gradeable;
use Submitty\Submitty\Models\GradeableList;

class NavigationController extends AbstractController {
    public function __construct(Core $core) {
        parent::__construct($core);
    }

    public function run() {
        switch ($_REQUEST['page']) {
            case 'no_access':
                $this->noAccess();
                break;
            default:
                $this->navigationPage();
                break;
        }
    }

    private function noAccess() {
        $this->core->getOutput()->renderOutput('Navigation', 'noAccessCourse');
    }

    private function navigationPage() {
        $gradeables_list = new GradeableList($this->core);
        $this->core->getOutput()->addCSS("https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700");
        $this->core->getOutput()->addCSS("https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic,700italic");
        $this->core->getOutput()->addCSS("https://fonts.googleapis.com/css?family=PT+Sans:700,700italic");
  		$this->core->getOutput()->addCSS("https://fonts.googleapis.com/css?family=Inconsolata");
        
        $future_gradeables_list = $gradeables_list->getFutureGradeables();
        $beta_gradeables_list = $gradeables_list->getBetaGradeables();
        $open_gradeables_list = $gradeables_list->getOpenGradeables();
        $closed_gradeables_list = $gradeables_list->getClosedGradeables();
        $grading_gradeables_list = $gradeables_list->getGradingGradeables();
        $graded_gradeables_list = $gradeables_list->getGradedGradeables();
        
        $sections_to_lists = array("FUTURE" => $future_gradeables_list,
                                   "BETA" => $beta_gradeables_list,
                                   "OPEN" => $open_gradeables_list,
                                   "CLOSED" => $closed_gradeables_list,
                                   "ITEMS BEING GRADED" => $grading_gradeables_list,
                                   "GRADED" => $graded_gradeables_list);
        
        if (!$this->core->getUser()->accessAdmin()) {
            foreach ($sections_to_lists as $key => $value) {
                $sections_to_lists[$key] = array_filter($value, array($this, "filterNoConfig"));
            }
        }
        $this->core->getOutput()->renderOutput('Navigation', 'showGradeables', $sections_to_lists);
    }
    
    /**
     * @param Gradeable $gradeable
     * @return bool
     */
    private function filterNoConfig($gradeable) {
        if ($gradeable->getType() == GradeableType::ELECTRONIC_FILE) {
            return $gradeable->hasConfig();
        }
        return true;
    }
}
