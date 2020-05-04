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
/*or create a new repository on the command line
echo "# laravel-forum-application" >> README.md
git init
git add README.md
git commit -m "first commit"
git remote add origin https://github.com/snigdho991/laravel-forum-application.git
git push -u origin master*/


/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/full', function () {
    return view('fullpage');
});

Route::get('/logintest', function () {
    return view('auth.logintest');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [
    'uses' => 'ForumController@index',
	'as'   => 'forum'
]);


Auth::routes();

Route::get('/join', [
  'uses' => 'Auth\LoginController@showLoginForm',
  'as'   => 'join'
]);

Route::get('/forum', [
    'uses' => 'ForumController@index',
	'as'   => 'forum'
]);

Route::get('{provider}/auth', [
	'uses' => 'SocialsController@auth',
	'as'   => 'social.auth'
]);

Route::get('{provider}/redirect', [
	'uses' => 'SocialsController@auth_callback',
	'as'   => 'social.callback'
]);

Route::get('/discussion/{slug}', [
    'uses' => 'DiscussionsController@show',
	'as'   => 'discussion'
]);


Route::get('/channel/{slug}', [
    'uses' => 'ForumController@channel',
	'as'   => 'channel'
]);


Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::group(['middleware' => 'auth'], function(){
	Route::resource('channels', 'ChannelsController');

	Route::get('/discussion/create/new', [
	    'uses' => 'DiscussionsController@create',
		'as'   => 'discussions.create'
	]);

	Route::post('/discussion/store', [
	    'uses' => 'DiscussionsController@store',
		'as'   => 'discussions.store'
	]);

	Route::post('/discussion/reply/{id}', [
	    'uses' => 'DiscussionsController@reply',
		'as'   => 'discussions.reply'
	]);

	Route::get('/discussion/upvote/{id}', [
		'uses' => 'DiscussionsController@upvote',
		'as'   => 'discussion.upvote'
	]);

	Route::get('/discussion/unupvote/{id}', [
		'uses' => 'DiscussionsController@unupvote',
		'as'   => 'discussion.unupvote'
	]);

	Route::get('/discussion/watch/{id}', [
		'uses' => 'WatchersController@watch',
		'as'   => 'discussion.watch'
	]);

	Route::get('/discussion/unwatch/{id}', [
		'uses' => 'WatchersController@unwatch',
		'as'   => 'discussion.unwatch'
	]);

	Route::post('/reply/like', [
		'uses' => 'RepliesController@likeReply',
		'as'   => 'like'
	]);

	Route::get('/discussion/reply/best/{id}', [
		'uses' => 'RepliesController@best_answer',
		'as'   => 'discussion.best.answer'
	]);

	Route::get('/discussion/edit/{slug}', [
		'uses' => 'DiscussionsController@edit',
		'as'   => 'discussion.edit'
	]);

	Route::post('/discussion/update/{slug}', [
		'uses' => 'DiscussionsController@update',
		'as'   => 'discussion.update'
	]);

	Route::get('/reply/edit/{id}', [
		'uses' => 'RepliesController@edit',
		'as'   => 'reply.edit'
	]);

	Route::post('/reply/update/{id}', [
		'uses' => 'RepliesController@update',
		'as'   => 'reply.update'
	]);

});
