<?php

namespace App\Http\Controllers\Api;
use App\Domain\Flags\Flags;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\ChallengeSolve;
use Illuminate\Http\Request;



class AddressController extends Controller
{


public function delete(Request $request)
{
    $addressId = (int) $request->input('address_id');

    $address = Address::find($addressId);
    if (!$address) {
        return back()->with('error', 'Address not found.');
    }

    $currentUserId = auth()->id();

    $isOtherUsersAddress = $address->user_id !== $currentUserId;

    $address->delete();

    if ($isOtherUsersAddress) {
        ChallengeSolve::firstOrCreate(
            [
                'user_id' => $currentUserId,
                'challenge_key' => 'challenge_01',
            ],
            [
                'solved_at' => now(),
            ]
        );

        $flag = Flags::get('challenge_01'); 

        return back()
            ->with('success', 'Address deleted successfully (IDOR).')
            ->with('flag', $flag)
            ->with('solved', true);
    }

    return back()->with('success', 'Address deleted successfully.');
}

}
