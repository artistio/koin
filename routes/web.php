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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route for Budget
Route::get('/budget', 'BudgetController@index')->name('budget');

// Route for Contact
Route::get('/contact', 'ContactController@index')->name('contact');

// Route for Expense
Route::get('/expense/category', 'ExpenseController@category')->name('selectCategory');
Route::get('/expense/new', 'ExpenseController@create')->name('createExpenseForm');
Route::post('/expense', 'ExpenseController@store')->name('storeExpense');
