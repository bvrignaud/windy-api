<?php

declare(strict_types=1);

namespace WindyApi\Requests;

use WindyApi\Enums\IncludeEnum;

readonly class WebcamsRequest
{
    /**
     * @param  string|null  $lang  Specify the desired language for translating the results, if supported.
     * @param  NearbyRequest|null  $nearby  Retrieves a list of webcams within a specified radius (in kilometers) around a given location.
     * @param  array<IncludeEnum>  $include  Specify the content to be displayed in the result by defining the desired parts of the webcam feed.
     */
    public function __construct(
        private ?string $lang = null,
        private ?NearbyRequest $nearby = null,
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

        if ($this->nearby) {
            $request['nearby'] = $this->nearby->toString();
        }

        if ($this->include) {
            $includeStrings = array_map(fn ($enum) => $enum->value, $this->include);
            $request['include'] = implode(',', $includeStrings);
        }

        return $request;
    }
}
