<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\MediaStoreRequest;
use Inertia\Inertia;
use Vimeo\Vimeo;

class MediaController
{
    public function index()
    {
//        $client = new Vimeo(env('VIMEO_ID'), env('VIMEO_SECRET'), env('VIMEO_TOKEN'));

//        $response = $client->request('/tutorial', array(), 'GET');


        return Inertia::render('Admin/MediaPage');
    }

    public function store(MediaStoreRequest $request)
    {
        $data = $request->validated();

        dd($data);
    }
}
