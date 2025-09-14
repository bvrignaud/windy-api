<?php

declare(strict_types=1);

namespace WindyApi\Enums;

enum IncludeEnum: string
{
    case categories = 'categories';
    case images = 'images';
    case location = 'location';
    case player = 'player';
    case urls = 'urls';
}
