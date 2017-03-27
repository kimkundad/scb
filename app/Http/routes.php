<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/thx', function () {
    return view('home');
});

Route::get('/course', function () {
    return view('course.index');
});

Route::get('/profile', function () {
    return view('profile.index');
});

Route::get('/live', function () {
    return view('live.index');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/register', 'RegisaccountController@register');
Route::post('/useraccount_register', 'RegisaccountController@store');

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');

Route::post('login', function()
{
    $credentials = Input::only('email', 'password');

    if ( ! Auth::attempt($credentials))
    {
        return Redirect::back()->withMessage('Invalid credentials');
    }

    if (Auth::user()->is_admin == 1)
    {
        return Redirect::to('/admin/dashboard');
    }

    return Redirect::to('/');
});

Route::group(['middleware' => 'admin'], function () {

    Route::resource('admin/dashboard', 'DashboardController');
    Route::resource('admin/user', 'UseraccountController');
    Route::resource('admin/group', 'GroupController');

});
