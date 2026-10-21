<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class WatchLaterController extends Controller
{
    /**
     * Show the watch later page.
     */
    public function index(Request $request): Response
    {
        return Inertia::render('WatchLater/WatchLaterPage');
    }
}