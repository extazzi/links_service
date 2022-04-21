<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class Request extends FormRequest
{

    public function getFormData(): array
    {
        $data = $this->all();

        $data = Arr::except($data, [
            '_token',
            '_method',
        ]);
        
        return $data;
    }
}
