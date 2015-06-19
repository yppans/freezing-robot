<?php namespace App\Http\Controllers;
use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
Use App\Profile;
use Auth;
//use Illuminate\Routing\Controller;
use Illuminate\Contracts\Auth\Authenticatable;
use Request;
use Socialize;
use Laravel\Socialite\Contracts\Factory as Socialite;

class ProfileController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index(Authenticatable $user)
	{
        $profile = $user->profile;
        $profile->name = $user->name;
        $profile->username = $user->username;
        $profile->email = $user->email;
		return view('layouts.profile', compact('profile'));
	}
    public function show($user)
    {
        $getuser = User::find($user);
        $profile = $getuser->profile;
        $profile->name = $getuser->name;
        $profile->username = $getuser->username;
        $profile->email = $getuser->email;
		return view('layouts.profile', compact('profile'));
    }

    public function edit(Authenticatable $user)
    {
        $profile = Profile::findorFail($user->id);
		$user = User::find($user->id);
		$profile->email = $user['email'];
        return view('auth.edit', compact('profile'));
    }
    
    public function update(Authenticatable $user, Request $request)
    {
		$getuser = User::find($user->id);
        $edits = Request::all();
		$getuser->email = $edits['email'];
		$getuser->password = bcrypt($edits['password']);
		$getuser->save();
        $profile = Profile::findorFail($user->id);
        $profile->phone = $edits['phone'];
        $profile->bio = $edits['bio'];
        $profile->website = $edits['website'];
        	$img = Request::file('avatar');
	if ($img != NULL) {
	$destinationPath = 'uploads/images/users/avatars';
	$prepend = date('YmdHis');
	$fileName = $prepend.".".$img->getClientOriginalExtension();
	Request::file('avatar')->move($destinationPath, $fileName);
	$profile->avatar = $fileName;
    }
        $profile->save();
        $updatedmsg = "Your profile has been successfully edited!";
        return redirect('profile')->with('message', $updatedmsg);
    }
}
