<?php

namespace App\Repositories;

use App\Models\Link;
use App\Services\Links\DTO\LinkCustomDTO;
use Carbon\Carbon;

class LinkRepository
{
    public static function saveLink(array $data): LinkCustomDTO
    {
        Link::create([
            'resource_link' => $data['resource_link'],
            'code' => $data['code'],
            'limit' => $data['limit'],
            'expired' => $data['expired'],
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
            ->where('expired', '>=', date("Y-m-d-H:i:s"))
            ->where(function ($query) {
                $query->where('limit', '=', 0);
                $query->orWhere(function($q) {
                    $q->where('limit', '>', 0);
                    $q->whereColumn('visited', '<', 'limit');
                });
            })
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
