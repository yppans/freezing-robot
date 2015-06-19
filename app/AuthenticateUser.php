<?php namespace App;
use Illuminate\Contracts\Auth\Guard;
use Laravel\Socialite\Contracts\Factory as Socialite;
use App\Repositories\UserRepository;
use Auth;
use App\User;
use App\Profile;
use Illuminate\Contracts\Auth\Authenticatable;

class AuthenticateUser {
    /**
     * @var UserRepository
     */
    private $users;
    /**
     * @var Socialite
     */
    private $socialite;
    /**
     * @var Guard
     */
    private $auth;
    /**
     * @param UserRepository $users
     * @param Socialite $socialite
     * @param Guard $auth
     */
    public function __construct(UserRepository $users, Socialite $socialite, Guard $auth)
    {
        $this->users = $users;
        $this->socialite = $socialite;
        $this->auth = $auth;
    }
    /**
     * @param boolean $hasCode
     * @param AuthenticateUserListener $listener
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function execute($hasCode, AuthenticateUserListener $listener)
    {
        if ( ! $hasCode) return $this->getAuthorizationFirst();
        $user = $this->users->findByUsernameOrCreate($this->getFacebookUser());
        $this->auth->login($user, true);

        
        return $listener->userHasLoggedIn($user);
    }
    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    private function getAuthorizationFirst()
    {
        return $this->socialite->driver('facebook')->redirect();
    }
    /**
     * @return \Laravel\Socialite\Contracts\User
     */
    private function getFacebookUser()
    {
        return $this->socialite->driver('facebook')->user();
    }
}