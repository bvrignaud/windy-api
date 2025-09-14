<?php

declare(strict_types=1);

namespace WindyApi\Dtos;

/**
 * @see https://api.windy.com/webcams/docs
 */
readonly class WebcamPlayerUrlsDto
{
    /**
     * @param  string|null  $live  Link that allows embedding the live stream of this webcam into a website (using iframe) or app (using WebView on Android or UIWebView on iOS)
     * @param  string  $day  Link that allows embedding the daily timelapse of this webcam into a website (using iframe) or app (using WebView on Android or UIWebView on iOS)
     * @param  string  $month  Link that allows embedding the monthly timelapse of this webcam into a website (using iframe) or app (using WebView on Android or UIWebView on iOS)
     * @param  string  $year  Link that allows embedding the yearly timelapse of this webcam into a website (using iframe) or app (using WebView on Android or UIWebView on iOS)
     * @param  string  $lifetime  Link that allows embedding the lifetime timelapse of this webcam into a website (using iframe) or app (using WebView on Android or UIWebView on iOS)
     */
    public function __construct(
        public ?string $live,
        public string $day,
        public string $month,
        public string $year,
        public string $lifetime,
    ) {}

    /**
     * Create a DTO from the API response
     *
     * @param  array{live?: string, day: string, month: string, year: string, lifetime: string}  $data
     */
    public static function fromApiResponse(array $data): self
    {
        return new self(
            live: $data['live'] ?? null,
            day: $data['day'],
            month: $data['month'],
            year: $data['year'],
            lifetime: $data['lifetime'],
        );
    }
}
