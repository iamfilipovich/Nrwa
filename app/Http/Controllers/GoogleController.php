<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
          
    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
         
            $findUser = User::where('google_id', $user->id)->orWhere('email', $user->email)->first();
         
            if ($findUser) {
                // Update Google ID if not already present
                if (!$findUser->google_id) {
                    $findUser->update(['google_id' => $user->id]);
                }

                Auth::login($findUser);

                return redirect()->intended('/home');
            } else {
                // Create a new user
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => Hash::make(uniqid()), // Generate a random secure password
                ]);

                Auth::login($newUser);

                return redirect()->intended('/home');
            }
        } catch (Exception $e) {
            // Log the error message instead of dumping it
            \Log::error('Google Login Error: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Something went wrong while trying to log you in.');
        }
    }
}
