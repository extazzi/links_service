<?php

namespace App\Repositories;

use App\Models\Link;

class LinkRepository
{
    public static function saveLink(array $data)
    {
        Link::create([
            'resource_link' => $data['resource_link'],
            'code' => $data['code'],
            'limit' => $data['limit'],
            'lifetime' => $data['lifetime'],
        ]);
    }

    public static function checkedUniqueCode(string $code):bool
    {
        $result = Link::where('code', $code)->first();
        
        if ($result === null) {
            return true;
        }
        
        return false;
    }
}
