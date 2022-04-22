<?php

namespace App\Repositories;

use App\Models\Link;
use App\Services\Links\DTO\LinkCustomDTO;

class LinkRepository
{
    public static function saveLink(array $data): LinkCustomDTO
    {
        Link::create([
            'resource_link' => $data['resource_link'],
            'code' => $data['code'],
            'limit' => $data['limit'],
            'lifetime' => $data['lifetime'],
        ]);

        return LinkCustomDTO::fromArray([
            'link' => $data['resource_link'],
            'code' => $data['code'],
            'status' => 201,
        ]);
    }

    public static function checkedUniqueCode(string $code): bool
    {
        $result = Link::where('code', $code)->first();

        if ($result === null) {
            return true;
        }

        return false;
    }

    public static function getLinkByCode(string $code): LinkCustomDTO
    {
        $link = Link::where('code', $code)
//            ->where('limit', '>', 0)
//            ->where('limit', '>', 0)
            ->first();

        if ($link) {
            return LinkCustomDTO::fromArray([
                'link' => $link->resource_link,
                'code' => $link->code,
                'status' => 200,
            ]);
        }

        return LinkCustomDTO::fromArray([
            'link' => '',
            'code' => '',
            'status' => 404,
        ]);
    }
}
