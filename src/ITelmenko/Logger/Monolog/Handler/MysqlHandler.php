<?php

namespace ITelmenko\Logger\Monolog\Handler;

use Monolog\Handler\AbstractProcessingHandler;
use ITelmenko\Logger\Laravel\Models\Log;
use Monolog\LogRecord;

class MysqlHandler extends AbstractProcessingHandler
{
    protected function write(LogRecord $record):void
    {
        Log::create([
            'instance' => gethostname(),
            'channel'  => $record['channel'],
            'message' => $record['message'],
            'level'   => $record['level_name'],
            'context' => $record['context']
        ]);
    }
}
