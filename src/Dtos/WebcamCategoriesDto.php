<?php

declare(strict_types=1);

namespace WindyApi\Dtos;

/**
 * DTO for webcam images from the Windy API
 *
 * @see https://api.windy.com/webcams/docs
 */
readonly class WebcamCategoriesDto
{
    /**
     * @param  string  $id  The category ID to be used as a filter.
     * @param  string  $name  The localized name of the category.
     */
    public function __construct(
        public string $id,
        public string $name,
    ) {}

    /**
     * Create a DTO from the API response
     *
     * @param  array{id: string, name: string}  $data
     */
    public static function fromApiResponse(array $data): self
    {
        return new self(
            id: $data['id'],
            name: $data['name'],
        );
    }
}
