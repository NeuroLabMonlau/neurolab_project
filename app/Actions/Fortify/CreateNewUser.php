<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function createMicrosoftLogIn($groupNames, $microsoftUser){
        foreach ($groupNames as $role){
            if ($role == 'Admin'){
                $role_id = '1';
                break;
            }
            if ($role == 'phycologist'){
                $role_id = '5';
                break;
            }
            else{
                $role_id = '3';
            }
        }

        $user = User::updateOrCreate(
            ['email' => $microsoftUser->email],
            [
                'username' => $microsoftUser->name,
                'password' => Hash::make('Monlau2024'),
                'role_id' => $role_id,
                'email_verified_at' => Carbon::now()
            ]
        );

        Log::info('Carbon::now()' . Carbon::now());

        return $user;
    }

    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'username' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role_id' => '3'
        ]);
    }
}