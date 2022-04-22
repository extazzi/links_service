<?php

namespace App\Services\Links\Providers;

use App\Models\Link;
use App\Services\Links\DTO\LinkCustomDTO;

interface LinkProviderInterface
{
    public function generate(): string;
    public function getLink(string $code): LinkCustomDTO;
    public function redirectToLink(LinkCustomDTO $linkCustomDTO);
    public function save(array $data): LinkCustomDTO;
    public function incrementVisited(Link|null $link);
}
