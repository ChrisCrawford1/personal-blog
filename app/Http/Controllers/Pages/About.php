<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class About extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view('pages.about');
    }
}
