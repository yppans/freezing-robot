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

class UserMgmtController extends Controller {
	
	public function __construct()
    {
        $this->middleware('App\Http\Middleware\AdminMiddleware');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();
        return view('layouts.users', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return redirect('profile/'.$id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$profile = Profile::where('user_id', '=', $id)->first();
		$user = User::find($id);
		$profile->email = $user['email'];
        return view('auth.edituser', compact('profile'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
    {

		$getuser = User::find($id);
		//dd($getuser);
        //$profile = Profile::where('user_id', '=', $id)->first();
		$profile = $getuser->profile;
        $edits = Request::all();
		$getuser->email = $edits['email'];
		$getuser->password = bcrypt($edits['password']);
		$getuser->save();
		//var_dump($edits);
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
        $updatedmsg = "The user has been successfully edited!";
        return redirect('usermanager')->with('message', $updatedmsg);
        
		//return $edits;
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
