<?php

declare(strict_types=1);

namespace helpers;

final class LogLevels
{
    public const string LEVEL_OFF = 'off';
    public const string LEVEL_ALL = 'all';
    public const string LEVEL_FATAL = 'fatal';
    public const string LEVEL_ERROR = 'error';
    public const string LEVEL_WARN = 'warning';
    public const string LEVEL_INFO = 'info';
    public const string LEVEL_DEBUG = 'debug';
    public const string LEVEL_TRACE = 'trace';

    private string $level;

    /**
     * LogLevels constructor.
     */
    private function __construct(string $level)
    {
        $this->level = $level;
    }

    // TODO: return the modified message with the correct error (code?) and datetime for log files.
}
