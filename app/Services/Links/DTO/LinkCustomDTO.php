<?php


namespace App\Services\Links\DTO;


use App\Models\Link;

class LinkCustomDTO
{

    public $link;
    public $status;

    protected function __construct(Link|null $link, int $status)
    {
        $this->link = $link;
        $this->status = $status;
    }

    public static function fromArray(array $data)
    {
        return new self(
            $data['link'],
            $data['status'],
        );
    }
}
