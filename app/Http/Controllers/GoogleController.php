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
                        'dlcodes' => null
                    ]
                );
            } else {
                $saveUser = User::where('email', $user->getEmail())->update([
                    'google_id' => $user->getId(),
                ]);
    
                $saveUser = User::where('email', $user->getEmail())->first();
            }
    
            // Assign 'driver' role to the user
            $driverRole = Role::where('name', 'driver')->first();
            if ($driverRole && $saveUser) {
                $saveUser->assignRole($driverRole);
            }
    
            Auth::loginUsingId($saveUser->id);
    
            return redirect()->route('user.dashboard');
    
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
}
