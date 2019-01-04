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

// API for testing only
Route::get('/BasicAccountType', 'BasicAccountTypeController@index');

// API for Categories
Route::get('/category', 'CategoryController@index');
Route::get('/category/{code}', 'CategoryController@show');
Route::post('/category', 'CategoryController@store');

// API for Contacts
Route::get('/contact', 'ContactController@index');
Route::get('/contact/{id}', 'ContactController@show');
Route::post('/contact', 'ContactController@store');

// API for Expense
Route::get('/expense', 'ExpenseController@index');
Route::get('/expense/{id}', 'ExpenseController@show');
Route::post('/expense', 'ExpenseController@store');
Route::delete('/expense/{id}', 'ExpenseController@destroy');
