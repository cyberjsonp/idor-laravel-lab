<?php

namespace App\Domain\Flags;

class Flags
{
    public static function flagFor(string $challengeKey): ?string
    {
        return match ($challengeKey) {
            'CH01' => 'IDORLAB{CH01_DELETE_OTHER_USERS_ADDRESS}',
            default => null,
        };
    }
}
