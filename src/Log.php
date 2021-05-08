<?php


namespace Joe;


use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Log
{
    public static function info($string)
    {
        $log = new Logger('aabbcc');
        $log->pushHandler(new StreamHandler('/Users/qiaoshitao/www/my/tests/your.log'), Logger::INFO);
        $log->info($string);
    }

}