<?php

namespace App\Http\Controllers\Challenges;

use App\Http\Controllers\Controller;

class Challenge01Controller extends Controller
{
    public function index()
    {
        return view('challenges.01.index');
    }
}
