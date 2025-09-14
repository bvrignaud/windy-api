<?php

declare(strict_types=1);

namespace WindyApi\Requests;

readonly class NearbyRequest
{
    public function __construct(
        private float $latitude,
        private float $longitude,
        private int $radius,
    ) {}

    public function toString(): string
    {
        return "$this->latitude,$this->longitude,$this->radius";
    }
}
