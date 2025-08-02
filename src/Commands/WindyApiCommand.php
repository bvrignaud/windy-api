<?php

namespace Benoit VRIGNAUD\WindyApi\Commands;

use Illuminate\Console\Command;

class WindyApiCommand extends Command
{
    public $signature = 'windy-api';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
