<?php

namespace App\Services\Links\Providers;

use App\Repositories\LinkRepository;
use Illuminate\Support\Str;

class LinkCustomProvider implements LinkProviderInterface
{
    public function generate(): string
    {
        return $this->generateUniqueCode();
    }

    private function generateUniqueCode(): string
    {
        $code = $this->generateRandomCode();
        $checked = self::checkUniqueCode($code);
        if (!$checked) {
            $this->generateUniqueCode($code);
        }

        return $code;
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
