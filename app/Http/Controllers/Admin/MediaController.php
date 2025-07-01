<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\MediaStoreRequest;
use App\Models\MediaItem;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Vimeo\Vimeo;

class MediaController
{
    public function index()
    {
//        $client = new Vimeo(env('VIMEO_ID'), env('VIMEO_SECRET'), env('VIMEO_TOKEN'));

//        $response = $client->request('/tutorial', array(), 'GET');


        return Inertia::render('Admin/Media/Index');
    }

    public function create()
    {
        return Inertia::render('Admin/Media/Create');
    }

    public function store(MediaStoreRequest $request)
    {
        $data = $request->validated();

        if($data['gender'] == 'Мужской')
            $data['gender'] = 'male';
        else if($data['gender'] == 'Женский')
            $data['gender'] = 'female';
        else
            $data['gender'] = 'all';

        $data['media_link'] = Storage::disk('public')->put('mediaFiles', $data['media_link']);

        $data['media_preview'] = Storage::disk('public')->put('mediaPreviews', $data['media_preview']);

        MediaItem::create($data);
    }
}
