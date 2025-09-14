<?php

declare(strict_types=1);

namespace WindyApi\Dtos;

use Carbon\CarbonImmutable;
use WindyApi\Enums\WebcamStatus;

/**
 * DTO for a webcam from the Windy API
 *
 * @see https://api.windy.com/webcams/docs
 */
readonly class WebcamDto
{
    /**
     * @param  int  $id  Webcam ID
     * @param  string  $title  Webcam title
     * @param  int  $viewCount  View count of this webcam since it was added to windy.com
     * @param  CarbonImmutable  $lastUpdatedOn  Datetime of the most recent webcam update
     * @param  LocationDto|null  $location  Webcam location
     * @param  WebcamImagesDto|null  $images  Webcam images
     * @param  WebcamCategoriesDto[]  $categories  Webcam categories
     * @param  WebcamPlayerUrlsDto|null  $player  Player information
     * @param  WebcamUrlsDto|null  $urls  Webcam URLs
     */
    public function __construct(
        public int $id,
        public string $title,
        public WebcamStatus $status,
        public int $viewCount,
        public CarbonImmutable $lastUpdatedOn,
        public ?array $categories = null,
        public ?WebcamImagesDto $images = null,
        public ?LocationDto $location = null,
        public ?WebcamPlayerUrlsDto $player = null,
        public ?WebcamUrlsDto $urls = null,
        // public array $rawData = [],
    ) {}

    /**
     * Create a DTO from the API response
     *
     * @param  array{webcamId: int, title: string, status: string, viewCount: int, lastUpdatedOn: string, categories?: array{array{id: string, name: string}}, images?: array{current: array{icon: string, thumbnail: string, preview: string}, daylight: array{icon: string, thumbnail: string, preview: string}, sizes: array{icon: array{width: int, height: int}, thumbnail: array{width: int, height: int}, preview: array{width: int, height: int}}}, location?: array{latitude: float, longitude: float, city: string, region: string, region_code?: string, country: string, country_code?: string, continent: string, continent_code?: string}, player?: array{live?: string, day: string, month: string, year: string, lifetime: string}, urls?: array{detail: string, edit: string, provider: string}}  $data
     */
    public static function fromApiResponse(array $data): self
    {
        $categories = [];

        if (isset($data['categories'])) {
            foreach ($data['categories'] as $category) {
                $categories[] = WebcamCategoriesDto::fromApiResponse($category);
            }
        }

        return new self(
            id: $data['webcamId'],
            title: $data['title'],
            status: WebcamStatus::from($data['status']),
            viewCount: $data['viewCount'],
            lastUpdatedOn: CarbonImmutable::parse($data['lastUpdatedOn']),
            categories: $categories,
            images: isset($data['images']) ? WebcamImagesDto::fromApiResponse($data['images']) : null,
            location: isset($data['location']) ? LocationDto::fromApiResponse($data['location']) : null,
            player: isset($data['player']) ? WebcamPlayerUrlsDto::fromApiResponse($data['player']) : null,
            urls: isset($data['urls']) ? WebcamUrlsDto::fromApiResponse($data['urls']) : null,
            // rawData: $data,
        );
    }
}
