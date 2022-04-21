<?php

namespace App\Http\Request\Links;


use App\Http\Request\Request;

class LinkRequest extends Request
{
    public function rules()
    {
        return [
            'resource_link' => 'required|string|min:2|unique:links',
            'limit' => 'nullable|int|min:0',
            'lifetime' => 'nullable|int|min:0|max:24',
        ];
    }

    public function getFormData(): array
    {
       return parent::getFormData();
    }
}
