<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;

class AdminMainController
{
    public function index()
    {
        return Inertia::render('Admin/MainPage');
    }
}
