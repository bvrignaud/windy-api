<?php

declare(strict_types=1);

namespace WindyApi;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

abstract class AbstractWindyApi
{
    protected PendingRequest $httpClient;

    public function __construct()
    {
        $this->httpClient = Http::withHeaders([
            'x-windy-api-key' => config('windy-api.key'),
        ])->throw();
    }
}
