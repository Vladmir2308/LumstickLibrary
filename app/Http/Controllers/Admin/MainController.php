<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;

class MainController
{
    public function index()
    {
        return Inertia::render('Admin/MainPage');
    }
}
