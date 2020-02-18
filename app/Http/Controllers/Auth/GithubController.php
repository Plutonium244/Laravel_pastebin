<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\User;
  
class GithubController extends Controller
{


    public function redirectToGithub()
    {
        return Socialite::driver('Github')->redirect();
    }


    public function handleGithubCallback()
    {
        try {
    
            $user = Socialite::driver('github')->user();
     
            $finduser = User::where('github_id', $user->id)->first();

            if($finduser) {
     
                Auth::login($finduser);
    
                return redirect('/home');
     
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'github_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
    
                Auth::login($newUser);
     
                return redirect('/home');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}