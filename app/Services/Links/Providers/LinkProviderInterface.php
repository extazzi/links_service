<?php

namespace App\Services\Links\Providers;

use App\Services\Links\DTO\LinkCustomDTO;

interface LinkProviderInterface
{
    public function generate(): string;
    public function getLink(string $code): LinkCustomDTO;
    public function redirectToLink(string $code);
    public function save(array $data): LinkCustomDTO;
}
