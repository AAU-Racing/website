<?php

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserService {
    function create($data) {
        return DB::transaction(function() use ($data) {
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

            if ($data['drivers_license']) {
                $user->driversLicence()->create([
                    'license_number' => $data['drivers_license']
                ]);
            }

            $user->contactPersons()->create([
                'name' => $data['name_contact_person'],
                'phone_number' => $data['phone_number_contact_person'],
                'primary' => true
            ]);

            if ($data['car'] != 'no') {
                $user->car()->create([
                    'towbar' => $data['car'] == 'towbar'
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

    function getAllUsers() {
        return User::all();
    }

    function findById($id) {
        return User::find($id);
    }
}
