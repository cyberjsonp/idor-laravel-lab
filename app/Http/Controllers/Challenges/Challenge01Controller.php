<?php

namespace App\Http\Controllers\Challenges;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use App\Models\ChallengeSolve;

class Challenge01Controller extends Controller
{
    public function index()
    {
       $addresses = \App\Models\Address::query()
        ->where('user_id', auth()->id())
        ->orderBy('id')
        ->get();

        $solved = ChallengeSolve::where('user_id', Auth::id())
            ->where('challenge_key', 'CH01')
            ->exists();
        return view('challenges.01.index', [
            'addresses' => $addresses,
            'solved' => $solved,
        ]);
    }
}
