<?php

namespace App\Services\Links;

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

    public function redirect(string $code)
    {
        return $this->linkProvider->redirectToLink($code);
    }  
    
    public function save(array $data)
    {
        return $this->linkProvider->save($data);
    }
}
