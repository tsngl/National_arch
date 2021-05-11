<?php

use Illuminate\Support\Facades\Route;

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
    $posts = DB::table('post')->where('status', '1')->get();
    
        return view('welcome')->with('posts', $posts);
});

Route::get('/relationship', function () {
    
    $athlete = \App\Models\Athletes::first();

    $competition = \App\Models\Competition::all();

    //$competition->athletes()->attach($athlete);
    $athlete->competitions()->attach($competition);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','admin']], function(){
    Route::get('/dashboard', 'Admin\DashboardController@dashboard');
    Route::get('/role-registered','Admin\DashboardController@registered');
    Route::get('/role-edit/{id}', 'Admin\DashboardController@registeredit');
    Route::put('/role-register-update/{id}','Admin\DashboardController@registerupdate');
    //Route::delete('/role-delete/{id}','Admin\DashboardController@registerdelete');
    Route::get('register-create','Admin\DashboardController@registercreate');
    Route::post('/save-new-register','Admin\DashboardController@store');

    Route::get('/users-info', 'Admin\DashboardController@users' );
    Route::get('/user-info-edit/{id}', 'Admin\DashboardController@useredit');
    Route::put('/user-info-update/{id}','Admin\DashboardController@userupdate');
    Route::delete('/user-info-delete/{id}','Admin\DashboardController@userdelete');

    Route::get('/users-archived','Admin\DashboardController@archived');
    Route::get('/user-restore/{id}','Admin\DashboardController@restore');

    Route::get('/post','Admin\DashboardController@post');
    Route::get('/post-create','Admin\DashboardController@postcreate');
    Route::post('/save-post','Admin\DashboardController@postsave');
    Route::get('/post-edit/{id}','Admin\DashboardController@postedit');
    Route::put('/post-update/{id}','Admin\DashboardController@postupdate');
    Route::get('/posted','Admin\DashboardController@posted');
    Route::get('/change-status/{id}','Admin\DashboardController@changestatus');
});

Route::group(['middleware' => ['auth','assistant']], function(){
    Route::get('/assistant','Assistant\AthletesController@athlete');
    Route::get('/athletes-info','Assistant\AthletesController@athletesinfo');
    Route::get('/add-athletes', 'Assistant\AthletesController@athletesadd');
    Route::post('/save-created','Assistant\AthletesController@store');
    Route::get('/athlete-edit/{id}','Assistant\AthletesController@athletesedit');
    Route::put('/athletes-update/{id}','Assistant\AthletesController@athletesupdate');
    Route::delete('/athlete-delete/{id}','Assistant\AthletesController@athletesdelete');

    Route::get('/athlete-archived','Assistant\AthletesController@archive');
    Route::get('/athlete-restore/{id}','Assistant\AthletesController@restore');

    Route::post('/participate','Assistant\AthletesController@participate')->name('participate.athletes');
    Route::get('/search', 'Assistant\AthletesController@search');
    //Route::get('/participant-athletes','Assistant\AthletesController@participantAthletes');
   // Route::delete('/participate-delete', 'Assistant\AthletesController@participantDelete')->name('deleteSelected');

    Route::get('/competition','Assistant\AthletesController@competition');
    Route::post('/save-comp','Assistant\AthletesController@competitionsave');
    Route::get('/comp-edit/{id}','Assistant\AthletesController@competitionedit');
    Route::put('/comp-update/{id}','Assistant\AthletesController@competitionupdate');
    Route::get('/comp-details/{id}','Assistant\AthletesController@competitionDetail');
    Route::get('/comp-delete/{id}','Assistant\AthletesController@competitionStatus');
});
Route::group(['middleware' => ['auth','judge']], function(){
    Route::get('/judge', 'Judge\JudgeController@viewathletes');
    Route::delete('/participate-deleteall', 'Judge\JudgeController@participantDeleteAll')->name('deleteallSelected');

    Route::get('/choose-competition','Judge\JudgeController@competition');
    Route::get('/choose-comp/{id}', 'Judge\JudgeController@choosedCompetitionAthletes');

    Route::get('/scoreboard','Judge\JudgeController@scoreboard');
    Route::get('/boardFemale','Judge\JudgeController@boardFemale' );
});
