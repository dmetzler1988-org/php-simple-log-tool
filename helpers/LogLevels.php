<?php


class LogLevels
{
    const LEVEL_OFF = 'off';
    const LEVEL_ALL = 'all';
    const LEVEL_FATAL = 'fatal';
    const LEVEL_ERROR = 'error';
    const LEVEL_WARN = 'warning';
    const LEVEL_INFO = 'info';
    const LEVEL_DEBUG = 'debug';
    const LEVEL_TRACE = 'trace';

    /** @var string */
    private string $level;

    /**
     * LogLevels constructor.
     *
     * @param string $level
     */
    private function __construct(string $level) {
        $this->level = $level;
    }

    // TODO: return the modified message with the correct error (code?) and datetime for log files.
}
