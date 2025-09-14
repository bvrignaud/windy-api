<?php

declare(strict_types=1);

namespace WindyApi;

use WindyApi\Dtos\PublicApiWebcamResponseDto;
use WindyApi\Dtos\PublicApiWebcamsResponseDto;
use WindyApi\Requests\WebcamRequest;
use WindyApi\Requests\WebcamsRequest;
use Illuminate\Http\Client\ConnectionException;

class Webcams extends AbstractWindyApi
{
    private const string BASE_URL = 'https://api.windy.com/webcams/api/v3';

    /**
     * @throws ConnectionException
     */
    public function getWebcams(WebcamsRequest $request): PublicApiWebcamsResponseDto
    {
        $response = $this->httpClient->get(self::BASE_URL.'/webcams', [
            ...$request->toArray(),
        ]);

        return PublicApiWebcamsResponseDto::fromApiResponse($response->json());
    }

    /**
     * Get a specific webcam by ID
     *
     * @param  int  $webcamId  The ID of the webcam
     * @return PublicApiWebcamResponseDto Webcam details
     *
     * @throws ConnectionException
     */
    public function getWebcamById(int $webcamId, ?WebcamRequest $request = null): PublicApiWebcamResponseDto
    {
        $response = $this->httpClient->get(self::BASE_URL."/webcams/$webcamId", [
            ...($request?->toArray() ?? []),
        ]);

        return PublicApiWebcamResponseDto::fromApiResponse($response->json());
    }
}
