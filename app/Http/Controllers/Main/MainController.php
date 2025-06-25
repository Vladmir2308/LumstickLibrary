<?php

namespace App\Http\Controllers\Main;

class MainController
{
    public function index()
    {
        return inertia('Main/IndexPage');
    }
}
