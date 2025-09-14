<?php

declare(strict_types=1);

namespace WindyApi\Requests;

use WindyApi\Enums\IncludeEnum;

readonly class WebcamRequest
{
    /**
     * @param  string|null  $lang  Specify the desired language for translating the results, if supported.
     * @param  array<IncludeEnum>  $include  Specify the content to be displayed in the result by defining the desired parts of the webcam feed.
     */
    public function __construct(
        private ?string $lang = null,
        private array $include = [],
    ) {}

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $request = [];

        if ($this->lang) {
            $request['lang'] = $this->lang;
        }

        if ($this->include) {
            $includeStrings = array_map(fn ($enum) => $enum->value, $this->include);
            $request['include'] = implode(',', $includeStrings);
        }

        return $request;
    }
}
