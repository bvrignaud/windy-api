<?php

declare(strict_types=1);

namespace WindyApi\Dtos;

/**
 * DTO for a webcam location from the Windy API
 *
 * @see https://api.windy.com/webcams/docs
 */
readonly class LocationDto
{
    /**
     * @param  float  $latitude  Latitude coordinate
     * @param  float  $longitude  Longitude coordinate
     * @param  string|null  $city  City name
     * @param  string|null  $region  Region name
     * @param  string|null  $country  Country name
     * @param  string|null  $continent  Continent name
     */
    public function __construct(
        public float $latitude,
        public float $longitude,
        public ?string $city = null,
        public ?string $region = null,
        public ?string $country = null,
        public ?string $continent = null,
    ) {}

    /**
     * Create a DTO from the API response
     *
     * @param  array{latitude: float, longitude: float, city: string, region: string, region_code?: string, country: string, country_code?: string, continent: string, continent_code?: string}  $data
     */
    public static function fromApiResponse(array $data): self
    {
        return new self(
            latitude: $data['latitude'],
            longitude: $data['longitude'],
            city: $data['city'],
            region: $data['region'],
            country: $data['country'],
            continent: $data['continent'],
        );
    }
}
