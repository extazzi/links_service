<?php

namespace App\Http\Request;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class Request extends FormRequest
{

    const DEFAULT_LIMIT_VALUE = 0;
    const DEFAULT_EXPIRED_VALUE = 24;

    public function getFormData(): array
    {
        $data = $this->all();

        $data = Arr::except($data, [
            '_token',
            '_method',
        ]);

        $expired = $data['expired'] ?: self::DEFAULT_EXPIRED_VALUE;
        $expiredAddHours = Carbon::now()->addHours($expired);
        $data['expired'] = Carbon::parse($expiredAddHours)->format('Y-m-d-H:i:s');
        $data['limit'] = $data['limit'] ?: self::DEFAULT_LIMIT_VALUE;

        return $data;
    }
}
