<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class GoogleController extends Controller
{
    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle()
    {
        try {
            $user = Socialite::driver('google')->user();
            
            $is_user = User::where('email', $user->getEmail())->first();
            
            if (!$is_user) {
                // Create a new user if not exists
                $saveUser = User::updateOrCreate(
                    [
                        'google_id' => $user->getId()
                    ],
                    [
                        'firstname' => $user->user['given_name'],
                        'lastname' => $user->user['family_name'],
                        'phone' => $user->phone_number,
                        'address' => $user->address,
                        'name' => $user->getName(),
                        'email' => $user->getEmail(),
                        'password' => Hash::make($user->getName() . '@' . $user->getId()),
                        'profile_photo_path' => 'https://ui-avatars.com/api/?name=' . urlencode($user->user['given_name'] . ' ' . $user->user['family_name']),
                        'dlcodes' => null,
                        'usertype' => 'user' // Set the usertype to "user"
                    ]
                );
            } else {
                // Update user's google_id and usertype if user already exists
                $saveUser = User::where('email', $user->getEmail())->update([
                    'google_id' => $user->getId(),
                ]);
                
                $saveUser = User::where('email', $user->getEmail())->first();
            }
        
            // Assign 'user' role to the user
            $userRole = Role::where('name', 'user')->first();
            if ($userRole && $saveUser) {
                $saveUser->assignRole($userRole);
            }

            // Log in the user
            Auth::login($saveUser);
        
            return redirect()->intended('/dashboard');
        } catch (\Throwable $th) {
            // Handle exceptions
            throw $th;
        }
    }
    
}
