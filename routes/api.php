<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route groups
Route::group(['prefix' => 'products', 'middleware' => [], 'namespace' => 'Api'], function () {
    Route::get('/', 'ProductController@index');
    Route::post('/', 'ProductController@store');
    Route::get('/', 'ProductController@show');
    Route::put('/', 'ProductController@update');
    Route::delete('/', 'ProductController@destroy');
});

// Route middleware
Route::middleware(['first', 'second'])->group(function () {

});

// Route namespaces
Route::namespace('Api')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
});

// Route sub-domain
Route::domain('{account}.myapp.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        //
    });
});

// Route Prefixes
Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        // Matches The "/admin/users" URL
    });
});

// Route Name Prefixes
Route::name('admin.')->group(function () {
    Route::get('users', function () {
        // Route assigned name "admin.users"...
    })->name('users');
});

// Rate Limiting
Route::middleware('auth:api', 'throttle:60,1')->group(function () {
    // an authenticated user may access the following group of routes 60 times per minute
    Route::get('/user', function () {
        //
    });
});
