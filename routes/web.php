<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	$systems = App\System::all();
	$games = App\Game::all();
	$scores = App\Score::with('game', 'user')->get();
    return view('welcome', compact('scores', 'systems', 'games'));
});

Route::resource('/system', 'SystemController');
Route::resource('/game', 'GameController');
Route::resource('/score', 'ScoreController');
Route::get('/myscores', 'ScoreController@my');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/**
 * Override the default auth register route to add middleware.
 */
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register')->middleware('hasInvitation');
Route::get('register/request', 'Auth\RegisterController@requestInvitation')->name('requestInvitation');
/**
 * Invitations group with auth middleware.
 * Eventhough we only have one route currently, the route group is for future updates.
 */
Route::group([
    'middleware' => ['auth', 'admin'],
    'prefix' => 'invitations'
], function() {
    Route::get('', 'InvitationsController@index')->name('showInvitations');
});
/**
 * Route for storing the invitation. Only for guest users.
 */
Route::post('invitations', 'InvitationsController@store')->middleware('guest')->name('storeInvitation');