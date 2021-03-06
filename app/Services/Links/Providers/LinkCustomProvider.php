<?php

namespace App\Services\Links\Providers;

use App\Events\LinkEvent;
use App\Models\Link;
use App\Repositories\LinkRepository;
use App\Services\Links\DTO\LinkCustomDTO;
use Illuminate\Support\Str;

class LinkCustomProvider implements LinkProviderInterface
{
    public function generate(): string
    {
        $code = $this->generateRandomCode();
        $checked = self::checkUniqueCode($code);
        if (!$checked) {
            $this->generate();
        }

        return $code;
    }

    public function getLink(string $code): LinkCustomDTO
    {
        return LinkRepository::getLinkByCode($code);
    }

    public function save(array $data): LinkCustomDTO
    {
        return LinkRepository::saveLink($data);
    }

    public function redirectToLink(LinkCustomDTO $linkCustomDTO)
    {
        if ($linkCustomDTO->status == 200) {

            return redirect()->away($linkCustomDTO->link->resource_link);
        }

        abort(404);
    }

    public function incrementVisited(Link|null $link)
    {
        if ($link !== null) {
            event(new LinkEvent($link));
        }
    }

    private function generateRandomCode(): string
    {
        return str_shuffle(Str::upper(Str::random(3)) . Str::lower(Str::random(3)) . mt_rand(10, 99));
    }

    private function checkUniqueCode(string $code): bool
    {
        return LinkRepository::checkedUniqueCode($code);
    }
}
