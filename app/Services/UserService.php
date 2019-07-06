<?php

namespace App\Services;

use App\ContactPerson;
use App\Http\Requests\EditUserRequest;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{
    function create($data)
    {
        return DB::transaction(function () use ($data) {
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

    function getAllUsers()
    {
        return User::all();
    }

    function findById($id)
    {
        return User::find($id);
    }

    function update($user, EditUserRequest $request)
    {
        DB::transaction(function () use ($user, $request) {
            $user->firstname = $request->input('firstname');
            $user->lastname = $request->input('lastname');
            $user->phone_number = $request->input('phone_number');
            $user->study_number = $request->input('study_number');
            $user->study_card_number = $request->input('study_card_number');
            $user->education = $request->input('education');
            $user->date_of_birth = $request->input('date_of_birth');

            $user->address()->zip = $request->input('zip');
            $user->address()->city = $request->input('city');
            $user->address()->address = $request->input('address');

            if (!$user->driversLicence && $request->input('drivers_license')) {
                $user->driversLicence()->create([
                    'license_number' => $request->input('drivers_license')
                ]);
            } else if ($user->driversLicence && !$request->input('drivers_license')) {
                $user->driversLicence()->delete();
            } else if ($user->driversLicence && $request->input('drivers_license')) {
                $user->driversLicence()->license_number = $request->input('drivers_license');
            }

            if (!$user->car && $request->input('car') != 'no') {
                $user->car()->create([
                    'towbar' => $request->input('car') == 'towbar'
                ]);
            } else if ($user->car && $request->input('car') == 'no') {
                $user->car()->delete();
            } else if (!$user->car && $request->input('car') != 'no') {
                $user->car()->towbar = $request->input('car') == 'towbar';
            }

            $ids = $user->contactPersons()->pluck('id')->except($request->input('contact_person.*.id'));
            ContactPerson::destroy($ids);

            foreach ($request->input('contact_person') as $index => $contactPerson) {
                $existing = $user->contactPersons()->where('id', $contactPerson['id'])->first();
                if ($existing) {
                    $existing->name = $contactPerson['name'];
                    $existing->phone_number = $contactPerson['phone_number'];
                    $existing->primary = $request->input('primary') == $existing->id;
                } else {
                    $user->contactPersons()->create([
                        'name' => $contactPerson['name'],
                        'phone_number' => $contactPerson['phone_number'],
                        'primary' => $request->input('primary') == $contactPerson['id']
                    ]);
                }
            }

            $user->push();
        });
    }

    public function all()
    {
        return User::all();
    }
}
