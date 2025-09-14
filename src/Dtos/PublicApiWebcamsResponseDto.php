<?php

declare(strict_types=1);

namespace WindyApi\Dtos;

use JsonSerializable;

/**
 * DTO for the Windy API webcams response
 *
 * @see https://api.windy.com/webcams/docs
 */
readonly class PublicApiWebcamsResponseDto implements JsonSerializable
{
    /**
     * @param  WebcamDto[]  $webcams  Array of webcams
     */
    public function __construct(
        public int $total,
        public array $webcams,
    ) {}

    /**
     * Create a DTO from the API response
     *
     * @param  array{total: int, webcams: list<array{webcamId: int, title: string, status: string, viewCount: int, lastUpdatedOn: string, categories?: array{array{id: string, name: string}}, images?: array{current: array{icon: string, thumbnail: string, preview: string}, daylight: array{icon: string, thumbnail: string, preview: string}, sizes: array{icon: array{width: int, height: int}, thumbnail: array{width: int, height: int}, preview: array{width: int, height: int}}}, location?: array{latitude: float, longitude: float, city: string, region: string, region_code?: string, country: string, country_code?: string, continent: string, continent_code?: string}, player?: array{live?: string, day: string, month: string, year: string, lifetime: string}, urls?: array{detail: string, edit: string, provider: string}}>}  $response
     */
    public static function fromApiResponse(array $response): self
    {
        $webcams = [];

        foreach ($response['webcams'] as $webcamData) {
            $webcams[] = WebcamDto::fromApiResponse($webcamData);
        }

        return new self($response['total'], $webcams);
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
