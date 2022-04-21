<?php

namespace App\Http\Controllers\Links;

use App\Http\Controllers\Controller;
use App\Http\Request\Links\LinkRequest;
use App\Repositories\LinkRepository;
use App\Services\Links\LinkService;

class LinkController extends Controller
{

    public function index()
    {
        return view('content.link');
    }

    public function create(LinkRequest $linkRequest, LinkService $linkService)
    {
        $data = $linkRequest->getFormData();
        $data['code'] = $linkService->generateCode();

        LinkRepository::saveLink($data);
        return view('content.link');
    }
}
