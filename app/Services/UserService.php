<?php

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserService {
    function create($data) {
        DB::transaction(function() use ($data) {
            $user = User::create([
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'phone_number' => $data['phone_number'],
                'password' => Hash::make($data['password']),
                'study_number' => $data['study_number'],
                'alumni' => false,
                'education' => $data['education'],
                'date_of_birth' => $data['date_of_birth'],
            ]);

            $user->clothesSize()->create([
                'waist_width' => $data['waist_width'],
                'shirt_size' => $data['shirt_size'],
            ]);

            if ($data['drivers_license']) {
                $user->driversLicence()->create([
                    'license_number' => $data['drivers_license']
                ]);
            }

            $user->address()->create([
                'zip' => $data['zip'],
                'city' => $data['city'],
                'address' => $data['address']
            ]);

            return $user;
        });
    }
}
