<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle()
    {
        try{
            
           $user = Socialite::driver('google')->user();
           
           $is_user = User::where('email',$user->getEmail())->first();

           if (!$is_user) {
            $saveUser = User::updateOrCreate(
                [
                    'google_id' => $user->getId()
                ],
                [
                    'firstname' => $user->user['given_name'], // Access first name from user array
                    'lastname' => $user->user['family_name'], // Access last name from user array
                    'phone' => $user->phone_number, // Access phone number
                    'address' => $user->address, // Access address
                    'name' => $user->getName(), // If available, otherwise concatenate first and last name
                    'email' => $user->getEmail(),
                    'password' => Hash::make($user->getName().'@'.$user->getId()), // Hash password
                    'profile_photo_path' => 'assets/img/avatars/driver.jpg', // Set default profile photo path
                    'dlcodes' => null // Set 'dlcodes' field to null
                ]                              
            );
         }
            else{
                $saveUser = User::where('email',$user->getEmail())->update([
                    'google_id' => $user->getId(),
                ]);

                $saveUser = User::where('email',$user->getEmail())->first();
            }

            Auth::loginUsingId($saveUser->id);

            return redirect()->route('dashboard');

        }catch (\Throwable $th){
            throw $th;
        }
    }
}
