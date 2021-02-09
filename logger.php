<?php

class Logger
{
    private static $instance;

    static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Logger();
        }

        return self::$instance;
    }


    public function logMessage($message, $debugLog = true)
    {
        $date = date("d/m/Y");
        $time = date("h:i:s");
        if ($debugLog) {
            echo "datum [$date][$time] $message \n";
        }

        file_put_contents('log.log', "datum [$date][$time] $message \n", FILE_APPEND | LOCK_EX);
    }
}
