<?php

namespace App\Http\Controllers\Challenges;

use App\Http\Controllers\Controller;

class ChallengeIndexController extends Controller
{
    public function index()
    {
        return view('challenges.index');
    }
}
