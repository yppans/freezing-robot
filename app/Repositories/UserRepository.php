<?php
/**
 * Created by PhpStorm.
 * User: tabutcu
 * Date: 2/28/15
 * Time: 3:03 PM
 */
namespace App\Repositories;
use Auth;
use App\User;
use App\Profile;
use Illuminate\Contracts\Auth\Authenticatable;

class UserRepository extends User{
    
    public function findByUsernameOrCreate($userData)
    {
        
		$fbuser = User::where('email', '=', $userData->email)->first();
		$userid = $fbuser->id;
		//$profile = Profile::firstOrCreate(['user_id' => $userid, 'avatar' => $userData->getAvatar]);
		
    //Profile::firstOrCreate(['user_id' => $userid, 'avatar' => $userData->getAvatar()]);
        return User::firstOrCreate([
            'name'  =>  $userData->name,
            'email' =>  $userData->email,
        ]);
        //Auth::login('Auth::user');
      

    }
    /*
            public function findByUserNameOrCreate($userData) {
        $user = User::where('email', '=', $userData->email)->first();
        if(!$user) {
            $user = User::firstOrCreate([
                'provider_id' => $userData->id,
                'name' => $userData->name,
                'username' => $userData->nickname,
                'email' => $userData->email,
            ]);
            Auth::login('user');
             $profile = Profile::firstOrCreate([
                'user_id' => (Auth::user()->id),
                'avatar' => $userData->getAvatar(),
            ]);
        }

            }
            */
                        

}
