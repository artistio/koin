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
Route::post('/category', 'CategoryController@store')->middleware('auth:api');;

// API for Contacts
Route::get('/contact', 'ContactController@index');
Route::get('/contact/{id}', 'ContactController@show');
Route::post('/contact', 'ContactController@store')->middleware('auth:api');;

// API for Expense
Route::get('/expense', 'ExpenseController@index')->middleware('auth:api');;
Route::get('/expense/{id}', 'ExpenseController@show')->middleware('auth:api');;
Route::post('/expense', 'ExpenseController@store')->middleware('auth:api');;
Route::delete('/expense/{id}', 'ExpenseController@destroy')->middleware('auth:api');;

// API for Budget
Route::get('/budget', 'BudgetController@index')->middleware('auth:api');;
Route::get('/budget/{id}', 'BudgetController@show')->middleware('auth:api');;
Route::post('/budget', 'BudgetController@store')->middleware('auth:api');;
Route::delete('/budget/{id}', 'BudgetController@destroy')->middleware('auth:api');;
