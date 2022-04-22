<?php

namespace App\Http\Controllers\Links;

use App\Http\Controllers\Controller;
use App\Http\Request\Links\LinkRequest;
use App\Services\Links\LinkService;

class LinkController extends Controller
{

    public function create()
    {
        return view('content.link');
    }

    public function store(LinkRequest $linkRequest, LinkService $linkService)
    {
        $data = $linkRequest->getFormData();
        $data['code'] = $linkService->generateCode();

        $DTO = $linkService->save($data);

        if ($DTO->status == 201) {
            $textSMS = "The link <a href='" . route('link.code', $DTO->code) . "' target='_blank'>" . route('link.code', $DTO->code) . "</a>  was created.";

            return redirect()->route('link.create')->with('success', $textSMS);
        }
    }

    public function move(string $code, LinkService $linkService)
    {
       return $linkService->redirect($code);
    }
}
