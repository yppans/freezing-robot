<?php

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('login/facebook', 'SocialLoginsController@socialLogin');
Route::get('showuserdata', function() {
		$user=\Socialize::with('facebook')->user();
		dd($user);
	});
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
		   ]);

//Admin Functions
Route::get('manageusers', 'UserMgmtController@index');
Route::resource('usermanager', 'UserMgmtController');
Route::resource('article', 'ArticleController');
//End Admin Functions

//Browse and read articles
Route::get('articles/category/{tag}', ['as' => 'articles.category', 'uses' => 'ArticlesController@showTagged']);
Route::get('articles/author/{author}', ['as' => 'articles.author', 'uses' => 'ArticlesController@showAuthor']);
Route::resource('articles', 'ArticlesController',
                ['only' => ['index', 'show']]);
//End Browse and read articles



//Separate edit controller to avoid using userid in URL
Route::get('profile/edit', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
Route::resource('profile', 'ProfileController', ['except' => 'edit']);


