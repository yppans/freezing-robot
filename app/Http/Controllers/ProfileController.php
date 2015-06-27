<?php namespace App\Http\Controllers;
use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
Use App\Profile;
use Auth;
//use Illuminate\Routing\Controller;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;

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
	public function __construct(Request $request)
	{
		$this->middleware('auth');
		$this->request = $request;
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

    public function editAccount(Authenticatable $user)
    {
        $profile = Profile::findorFail($user->id);
		$user = User::find($user->id);
		$profile->username = $user['username'];
		$profile->email = $user['email'];
        return view('auth.editaccount', compact('profile'));
    }
 
    public function editprofile(Authenticatable $user)
    {
        $profile = Profile::findorFail($user->id);
		$user = User::find($user->id);
        return view('auth.editprofile', compact('profile'));
    }
    
    public function updateAccount(Authenticatable $user, Request $request)
    {
		//$edits = Request::all();
		$getuser = User::find($user->id);
		$edits = $this->request->all();
		$getuser->username = $edits['username'];
		$getuser->email = $edits['email'];
		$getuser->password = bcrypt($edits['password']);
	$this->validate($request, [
		'username' => 'unique:users,username|max:30',
	]);
		$getuser->save();
        $updatedmsg = "Your profile has been successfully edited!";
        return redirect('profile')->with('message', $updatedmsg);
     }
    public function updateProfile(Authenticatable $user, Request $request)
    {
        $profile = Profile::findorFail($user->id);
	$edits = $this->request->all();
        $profile->phone = $edits['phone'];
        $profile->bio = $edits['bio'];
        $profile->website = $edits['website'];
        	//$img = Request::file('avatar');
		$img = $this->request->file('avatar');
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
