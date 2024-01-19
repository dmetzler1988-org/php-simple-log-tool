<?php

declare(strict_types=1);

interface config {
    // Set the path where the logfile should be saved.
    public const string logFilePath = __DIR__ . '/logs';
    // Set the time for how long the log files should be stored (in days).
    // To disable it, use 0.
    public const int keepLogFiles = 20;
    // Define what should be written to log file.
    public const array writeLogLevelsToFile = ['fatal, error, warning'];

    // Enable or disable the service to send defined errors via email.
    public const bool enableLogMailService = true;
    // Define the error levels, on which emails should be sent.
    public const array emailNotificationLevels = ['fatal', 'error', 'warning'];
    // Set email addresses to which the mails should be sent.
    public const string emailAddresses = 'mail@google.com, another.mail@google.com';
    // Define a subject for your emails.
    // Use the placeholder "$level$" for error level output.
    public const string emailSubject = '$level$: SimpleLogTool Report';
}
