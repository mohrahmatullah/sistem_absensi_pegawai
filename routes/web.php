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

// Route::get('/', function () {
//     return redirect()->route('auth.login');
// });


// Admin Routes
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin', 'middleware' => 'auth'], function(){
    // Index   
    Route::get('/','HomeController@index')->name('.index');
    // Employes Index
    Route::get('/employees','EmployeesController@index')->name('.employees.index')->middleware('checkRole');
    // Employes Create 
    Route::get('/employees/create','EmployeesController@create')->name('.employees.create')->middleware('checkRole');
    Route::post('/employees/store','EmployeesController@store')->name('.employees.store')->middleware('checkRole'); 
    Route::post('/employees/update','EmployeesController@update')->name('.employees.update')->middleware('checkRole');

    // Route::resource('/employees','EmployeesController');
    // Absensi Index
    Route::get('/absensi','AbsensiController@index')->name('.absensi.index')->middleware('checkRole');
    // Employes Index
    Route::get('/company','CompanyController@index')->name('.company.index')->middleware('checkRole');
    // Employes Create 
    Route::get('/company/create','CompanyController@create')->name('.company.create')->middleware('checkRole');
    Route::post('/company/store','CompanyController@store')->name('.company.store')->middleware('checkRole');
    Route::post('/company/update','CompanyController@update')->name('.company.update')->middleware('checkRole');
    
    // Edit
    Route::get('/ajax/edit-item', 'AjaxController@selectedItemEditById')->name('.selected-item-edit')->middleware('checkRole');
    // Delete
    Route::post('/ajax/delete-item', 'AjaxController@selectedItemDeleteById')->name('.selected-item-delete')->middleware('checkRole');
    // Edit
    Route::post('/ajax/save-related-image', 'AjaxController@saveAllImage')->name('.save-related-image')->middleware('checkRole');

    // User Index
    Route::get('/users','UsersController@index')->name('.users.index')->middleware('checkRole');
    // User Create 
    Route::get('/users/create','UsersController@create')->name('.users.create')->middleware('checkRole');
    Route::post('/users/store','UsersController@store')->name('.users.store')->middleware('checkRole');
    // User Edit
    Route::get('/users/edit/{id}','UsersController@edit')->name('.users.edit');
    Route::put('/users/update/{id}','UsersController@update')->name('.users.update');
    // User Delete
    Route::delete('/users/delete/{id}','UsersController@delete')->name('.users.delete')->middleware('checkRole');
});

Route::get('/','HomeController@index')->name('home');
Route::post('create','HomeController@create')->name('create');
// Auth Routes
Route::group(['namespace' => 'Auth', 'as' => 'auth'], function(){
    // Login Page 
    Route::get('/login',     'LoginController@showLoginForm')->name('.login');
    // Login Post
    Route::post('/login',    'LoginController@login')->name('.login');
    // Logout
    Route::get('/logout',    'LoginController@logout')->name('.logout');
});
