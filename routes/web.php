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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('job/search', 'HomeController@search')->name('search.job');

Route::middleware(['auth','is_user'])->group(function () {
    Route::get('job/apply/{id}', 'HomeController@apply')->name('apply.job');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::post('/profile/update', 'ProfileController@update')->name('profile.update');

});


Route::get('/admin', function(){ return view('admin.login'); });

Route::namespace('Admin')->prefix('admin')->middleware(['auth','is_admin'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::get('/jobs/applicant', 'JobController@applicant')->name('jobs.applicant');
    Route::resource('/jobs', 'JobController');

    Route::get('/users', 'UserController@index')->name('users.index');
    Route::get('/users/search', 'UserController@search')->name('users.search');
});
