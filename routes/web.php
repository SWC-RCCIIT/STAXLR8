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

Route::get("/login", function (){
    return view('login');
});

Route::get("/signup", function (){
    return view('signup');
});

Route::get("/doctor-dashboard", 'DoctorController@dashboard');
Route::post('/register-doctor', 'DoctorController@store');
Route::post('/doctor-login', 'DoctorController@login');

Route::get("/prescription", function (){
    return view('prescription');
});

Route::get("/pres", function (){
    return view('prescription');
});

Route::post("/prescription-create", 'PrescriptionController@create');
Route::get("/prescription-get/{id}", 'PrescriptionController@show');


Route::get('/test', 'DoctorController@index');

