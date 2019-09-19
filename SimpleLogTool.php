<?php
require_once __DIR__ . '/config.php';

class SimpleLogTool
{
    const EMAIL_SUBJECT_PLACEHOLDER = '$level$';

    /** @var string */
    private string $logFilePath;

    /** @var int */
    private int $keepLogFiles;

    /** @var array */
    private array $writeLogLevelsToFile;

    /** @var bool */
    private bool $enableLogMailService;

    /** @var array */
    private array $emailNotificationLevels;

    /** @var string */
    private string $emailAddresses;

    /** @var string */
    private string $emailSubject;

    /**
     * SimpleLogTool constructor.
     */
    public function __construct() {
        $this->logFilePath = config::logFilePath;
        $this->keepLogFiles = config::keepLogFiles;
        $this->writeLogLevelsToFile = config::writeLogLevelsToFile;
        $this->enableLogMailService = config::enableLogMailService;
        $this->emailNotificationLevels = config::emailNotificationLevels;
        $this->emailAddresses = config::emailAddresses;
        $this->emailSubject = config::emailSubject;
    }

    /**
     * Main function to execute the simple log tool.
     *
     * @param string $message
     */
    public function run(string $message) {
        // TODO: check if log folder exist, else create one
        // TODO: check if log folder can be created, else throw error and break
        // TODO: check if file is available, else create one
        // TODO: check if file can be created, else throw error and break
        // TODO: check if file can be written, else throw error and break

        // If option to keep log files is higher than zero, try to delete older log files.
        if ($this->keepLogFiles > 0) {
            self::deleteOldLogFiles();
        }

        // If option to send notification via email is enabled, try to send the notification email.
        if ($this->enableLogMailService) {
            self::sendNotificationMail($message);
        }
    }

    /**
     * Delete old log files which are older than defined days to keep it.
     */
    private function deleteOldLogFiles() {
        $files = glob(__DIR__ . '/*_logs.log');
        $now = time();

        foreach ($files as $file) {
            if (is_file($file)) {
                if ($now - filemtime($file) >= 60 * 60 * 24 * $this->keepLogFiles) {
                    unlink($file);
                }
            }
        }
    }

    /**
     * Write the message to the log file.
     *
     * @param string $message
     */
    private function writeLogFile(string $message) {
    }

    /**
     * Send a notification mail to declared email addresses with defined subject and the log message.
     *
     * @param string $message
     * @param string $errorLevel
     */
    private function sendNotificationMail(string $message, string $errorLevel) {
        $emailSubject = $this->emailSubject;
        if (strpos($emailSubject, EMAIL_SUBJECT_PLACEHOLDER) !== false) {
            $emailSubject = str_replace(EMAIL_SUBJECT_PLACEHOLDER, $errorLevel, $emailSubject);
        }

        try {
            mail($this->emailAddresses, $emailSubject, $message);
        } catch (Exception $e) {
            // TODO: write it down to log file.
        }
    }
}
