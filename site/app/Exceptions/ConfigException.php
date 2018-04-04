<?php

namespace Submitty\Submitty\Exceptions;

class ConfigException extends BaseException {

    /**
     * ConfigException constructor
     *
     * Exceptions that come from the Config model should go through this class
     * @see \Submitty\Submitty\Models\Config
     *
     * @param string $message      Message to show to user and log
     * @param bool   $show_message Do we want to show the exception message to the user
     */
    public function __construct($message, $show_message=true) {
        parent::__construct($message);
        $this->show_exception_message = $show_message;
        // exceptions thrown in config that we show to the user we generally don't want to log
        $this->log_exception = !$show_message;
    }
}
