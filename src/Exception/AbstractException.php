<?php

namespace App\Exception;

use Throwable;

abstract class AbstractException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    protected function storeToLog()
    {
        $logFile = "logs/error_log.log";
        $date = date('d-M-Y H:i:s e');
        $message = "[$date]" . "\n" .
                    "Message: " . $this->getMessage() . "\n" .
                    "Code: " . $this->getCode() . "\n" .
                    "File: " . $this->getFile() . "\n" .
                    "Line: " . $this->getLine() . "\n" .
                    "Trace: " . $this->getTraceAsString() . "\n\n";

        file_put_contents($logFile, $message, FILE_APPEND);
    }

    public function handleError()
    {
        $this->storeToLog();
        die('Sorry, something went wrong!');
    }
}