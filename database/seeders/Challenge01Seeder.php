<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Hash;

class Challenge01Seeder extends Seeder
{
    public function run(): void
    {
        // 1. ایجاد 5 کاربر تستی (اگر از قبل وجود ندارند)
        // یوزرهای 1 و 2 همان Victim و Attacker قبلی هستند
        $emails = [
            'alice@idorlab.test',
            'bob@idorlab.test',
            'mamad@cyberjson.com',
            'victim@idorlab.test',
            'attacker@idorlab.test',
            'test@example.com',
        ];

        foreach ($emails as $index => $email) {
            $user = User::updateOrCreate(
                ['email' => $email],
                [
                    'name' => "User " . ($index + 1),
                    'password' => Hash::make('password'),
                ]
            );

            // 2. برای هر کاربر 5 آدرس بساز
            for ($i = 1; $i <= 6; $i++) {
                Address::create([
                    'user_id' => $user->id,
                    'label' => "Address {$i} for {$user->name}",
                    'full_name' => "Recipient Name {$i}",
                    'line1' => "Street Address " . rand(100, 999),
                    'city' => "City Name",
                    'postal_code' => rand(10000, 99999),
                    'country' => "United States",
                ]);
            }
        }
    }
}
