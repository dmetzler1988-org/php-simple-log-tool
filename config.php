<?php
interface config {
    // Set the path where the logfile should be saved.
    const logFilePath = __DIR__ . '/logs';
    // Set the time for how long the log files should be stored (in days).
    // To disable it, use 0.
    const keepLogFiles = 20;
    // Define what should be written to log file.
    const writeLogLevelsToFile = ['fatal, error, warning'];

    // Enable or disable the service to send defined errors via email.
    const enableLogMailService = true;
    // Define the error levels, on which emails should be sent.
    const emailNotificationLevels = ['fatal', 'error', 'warning'];
    // Set email addresses to which the mails should be sent.
    const emailAddresses = 'mail@google.com, another.mail@google.com';
    // Define a subject for your emails.
    // Use the placeholder "$level$" for error level output.
    const emailSubject = '$level$: SimpleLogTool Report';
}
