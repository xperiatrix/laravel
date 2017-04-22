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
//    return view('welcome');

    return "Hello Laravel";
});


Route::get('/home/{name}', function ($name) {
    return array("1", "2", "3", "4", $name);
});


Route::post('test', function () {
    return array("1", "2", "3", "4");  // create
});


Route::get('test', function () {  // read
    echo '<form action="test" method="POST">';
    echo '<input type="submit">';
    echo '<input type="hidden" value="' . csrf_token() .'" name="_token">';
    echo '<input type="hidden" value="PUT" name="_method">';
    echo '<input type="hidden" value="DELETE" name="_method">';
    echo '</form>';
});


Route::put('test', function () {
    echo 'This method triggers from Put';  // update
});

Route::delete('test', function () {
    echo 'This method triggers from Delete';  // delete
});



