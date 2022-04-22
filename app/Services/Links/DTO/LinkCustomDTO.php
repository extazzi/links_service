<?php


namespace App\Services\Links\DTO;


class LinkCustomDTO
{

    public $link;
    public $status;
    public $code;

    protected function __construct(string $link, string $code, int $status)
    {
        $this->link = $link;
        $this->code = $code;
        $this->status = $status;
    }

    public static function fromArray(array $data)
    {
        return new self(
            $data['link'],
            $data['code'],
            $data['status'],
        );
    }
}
