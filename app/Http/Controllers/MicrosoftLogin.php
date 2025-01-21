<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;
use App\Actions\Fortify\CreateNewUser;
use DeepCopy\f001\B;
use Illuminate\Support\Facades\Auth;

class MicrosoftLogin extends Controller
{
    protected $createNewUser;

    public function __construct(CreateNewUser $createNewUser)
    {
        $this->createNewUser = $createNewUser;
    }

    public function redirectToMicrosoft(){
        return Socialite::driver('microsoft')->redirect();
    }

    public function handleMicrosoftCallback(){
        try {
            $microsoftUser = Socialite::driver('microsoft')->user();
            
            $accessToken = $microsoftUser->token;
        
            $client = new \GuzzleHttp\Client();
            $response = $client->get('https://graph.microsoft.com/v1.0/me/memberOf', [
                'headers' => [
                    'Authorization' => "Bearer $accessToken",
                    'Accept' => 'application/json'
                ],
            ]);
            $groups = json_decode($response->getBody(), true);
            $groupNames = [];
        
            foreach ($groups['value'] as $group){
                if(isset($group['displayName'])) {
                    $groupNames[] = $group['displayName'];
                }
            }

            $user = $this->createNewUser->createMicrosoftLogIn($groupNames, $microsoftUser);

            dd($user);

            Auth::login($user);
            $redirectUrl = match (Auth::user()->role->role_type) {
                'admin' => RouteServiceProvider::ADMIN,
                'teacher' => RouteServiceProvider::TEACHER,
                'student' => RouteServiceProvider::STUDENT,
                'tutor' => RouteServiceProvider::TUTOR,
                'psychologist' => RouteServiceProvider::PSYCHOLOGIST,
                default => '/',
            };

            return redirect()->to($redirectUrl);
        } catch (InvalidStateException $e) {
            return redirect()->route('microsoft.redirect');
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $responseBody = json_decode($e->getResponse()->getBody()->getContents(), true);
            if (isset($responseBody['error']) && $responseBody['error'] == 'invalid_grant') {
                return redirect()->route('microsoft.redirect');
            }
            throw $e;
        }
    }
    
}