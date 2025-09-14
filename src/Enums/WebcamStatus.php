<?php

declare(strict_types=1);

namespace WindyApi\Enums;

enum WebcamStatus: string
{
    case active = 'active';
    case inactive = 'inactive';
}
