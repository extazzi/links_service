<?php

namespace App\Services\Links;

use App\Models\Link;
use App\Services\Links\DTO\LinkCustomDTO;
use App\Services\Links\Providers\LinkProviderInterface;

class LinkService
{
    private $linkProvider;

    public function __construct(LinkProviderInterface $linkProvider)
    {
        $this->linkProvider = $linkProvider;
    }

    public function generateCode(): string
    {
        return $this->linkProvider->generate();
    }

    public function redirect(LinkCustomDTO $linkCustomDTO)
    {
        return $this->linkProvider->redirectToLink($linkCustomDTO);
    }

    public function save(array $data): LinkCustomDTO
    {
        return $this->linkProvider->save($data);
    }

    public function getLink(string $code): LinkCustomDTO
    {
        return $this->linkProvider->getLink($code);
    }

    public function increaseVisited(Link|null $link)
    {
        $this->linkProvider->incrementVisited($link);
    }
}
