<?php

namespace App\Services\Links\Providers;

interface LinkProviderInterface
{
    public function generate(): string;
}
