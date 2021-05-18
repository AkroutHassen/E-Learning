<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/*
Route::get('/', function () {
    return view('Admin.layouts.template');
});
Route::get('/Enseignants', function () {
    return view('Enseignants.layouts.template');
});
Route::get('/Etudiants', function () {
    return view('Etudiants.layouts.template');
});
*/

Route::resource('etudiant/cours', 'Etudiants\CoursController');

Route::resource('etudiant/diplome', 'Etudiants\DiplomesController');

Route::resource('etudiant/infos', 'Etudiants\InfosController');

Route::resource('etudiant/note', 'Etudiants\NotesController');

//Route::resource('enseignant/diplome', 'Enseignants\DiplomesController');

//Route::resource('enseignant/cours', 'Enseignants\CoursController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
