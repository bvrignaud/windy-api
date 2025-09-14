<?php

declare(strict_types=1);

namespace WindyApi\Dtos;

/**
 * DTO for webcam URLs from the Windy API
 *
 * @see https://api.windy.com/webcams/docs
 */
readonly class WebcamUrlsDto
{
    /**
     * @param  string  $detail  URL linking to the view of the webcam at windy.com
     * @param  string  $edit  URL for providing feedback to the webcam
     * @param  string  $provider  Webcam provider URL
     */
    public function __construct(
        public string $detail,
        public string $edit,
        public string $provider,
    ) {}

    /**
     * Create a DTO from the API response
     *
     * @param  array{detail: string, edit: string, provider: string}  $data
     */
    public static function fromApiResponse(array $data): self
    {
        return new self(
            detail: $data['detail'],
            edit: $data['edit'],
            provider: $data['provider'],
        );
    }
}
