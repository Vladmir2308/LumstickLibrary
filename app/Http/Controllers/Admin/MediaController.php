<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;

class MediaController
{
    public function index()
    {
        return Inertia::render('Admin/MediaPage');
    }
}
