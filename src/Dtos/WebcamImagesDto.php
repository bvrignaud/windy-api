<?php

declare(strict_types=1);

namespace WindyApi\Dtos;

/**
 * DTO for webcam images from the Windy API
 *
 * @php
 *
 * @see https://api.windy.com/webcams/docs
 */
readonly class WebcamImagesDto
{
    /**
     * @param  array<string, string>  $current  Current images
     * @param  array<string, string>  $daylight  Daylight images
     * @param  array<string, array<string, int>>  $sizes  Available image sizes
     */
    public function __construct(
        public array $current,
        public array $daylight,
        public array $sizes,
    ) {}

    /**
     * Create a DTO from the API response
     *
     * @param  array{current: array{icon: string, thumbnail: string, preview: string}, daylight: array{icon: string, thumbnail: string, preview: string}, sizes: array{icon: array{width: int, height: int}, thumbnail: array{width: int, height: int}, preview: array{width: int, height: int}}}  $data
     */
    public static function fromApiResponse(array $data): self
    {
        return new self(
            current: $data['current'],
            daylight: $data['daylight'],
            sizes: $data['sizes'],
        );
    }
}
