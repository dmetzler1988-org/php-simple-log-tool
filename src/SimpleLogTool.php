<?php

declare(strict_types=1);

require_once __DIR__ . '/config.php';

final class SimpleLogTool
{
    const EMAIL_SUBJECT_PLACEHOLDER = '$level$';

    private string $logFilePath = config::logFilePath;
    private int $keepLogFiles = config::keepLogFiles;
    private array $writeLogLevelsToFile = config::writeLogLevelsToFile;
    private bool $enableLogMailService = config::enableLogMailService;
    private array $emailNotificationLevels = config::emailNotificationLevels;
    private string $emailAddresses = config::emailAddresses;
    private string $emailSubject = config::emailSubject;

    /**
     * Main function to execute the simple log tool.
     */
    public function run(string $message): void
    {
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
    private function deleteOldLogFiles(): void
    {
        $files = glob(__DIR__ . '/*_logs.log');
        $now = time();

        foreach ($files as $file) {
            if (is_file($file) && $now - filemtime($file) >= 60 * 60 * 24 * $this->keepLogFiles) {
                unlink($file);
            }
        }
    }

    /**
     * Write the message to the log file.
     */
    private function writeLogFile(string $message): void
    {
    }

    /**
     * Send a notification mail to declared email addresses with defined subject and the log message.
     */
    private function sendNotificationMail(string $message, string $errorLevel): void
    {
        $emailSubject = $this->emailSubject;
        if (strpos($emailSubject, EMAIL_SUBJECT_PLACEHOLDER) !== false) {
            $emailSubject = str_replace(EMAIL_SUBJECT_PLACEHOLDER, $errorLevel, $emailSubject);
        }

        try {
            mail($this->emailAddresses, $emailSubject, $message);
        } catch (Exception $exception) {
            // TODO: write it down to log file.
        }
    }
}
