<?php

namespace App\Http\Controllers\Challenges;

use App\Http\Controllers\Controller;

class ChallengeIndexController extends Controller
{
    public function index()
    {
        $challenges = [
            [
                'number' => '01',
                'title' => 'Delete Other Users\' Shipping Address',
                'difficulty' => 'Easy',
                'category' => 'IDOR',
                'description' => 'A write-based IDOR where changing address_id lets you delete another user’s saved address.',
                'route' => route('challenges.01.index'),
            ],
        ];

        return view('challenges.index', [
            'challenges' => $challenges,
        ]);
    }
}
