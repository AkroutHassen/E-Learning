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

Auth::routes();

// Les routes de l'étudiants
Route::get('etudiant/cours', 'Etudiants\CoursController@index')->name('etudiant.cours.index');
Route::get('etudiant/cours/{cour}', 'Etudiants\CoursController@show')->name('etudiant.cours.show');
Route::get('etudiant/diplome', 'Etudiants\DiplomesController@index')->name('etudiant.diplome.index');
Route::get('etudiant/infos/{info}', 'Etudiants\InfosController@show')->name('etudiant.infos.show');
Route::get('etudiant/infos/{info}/edit', 'Etudiants\InfosController@edit')->name('etudiant.infos.edit');
Route::put('etudiant/infos/{info}', 'Etudiants\InfosController@update')->name('etudiant.infos.update');
Route::get('etudiant/notes/{note}', 'Etudiants\NotesController@show')->name('etudiant.note.show');
Route::post('etudiant/inscription', 'Etudiants\InscriptionsController@store')->name('etudiant.inscription.store');
Route::delete('etudiant/inscription/{inscription}', 'Etudiants\InscriptionsController@destroy')->name('etudiant.inscription.destroy');

// Les routes de l'enseignant
// Route::resource('enseignant/diplome', 'Enseignants\DiplomesController');
Route::get('enseignant/infos/{info}', 'Enseignants\InfosController@show')->name('enseignant.infos.show');
Route::get('enseignant/infos/{info}/edit', 'Enseignants\InfosController@edit')->name('enseignant.infos.edit');
Route::put('enseignant/infos/{info}', 'Enseignants\InfosController@update')->name('enseignant.infos.update');
Route::get('enseignant/cours', 'Enseignants\CoursController@index')->name('enseignant.cours.index');
Route::get('enseignant/cours/{cour}', 'Enseignants\CoursController@show')->name('enseignant.cours.show');
Route::get('enseignant/tds', 'Enseignants\TDsController@index')->name('enseignant.tds.index');
Route::get('enseignant/tds/{td}', 'Enseignants\TDsController@show')->name('enseignant.tds.show');

//Route::resource('enseignant/cours', 'Enseignants\CoursController');
//Route::resource('enseignant/infos', 'Enseignants\InfosController');
Route::resource('enseignant/note', 'Enseignants\NotesController');
Route::get('enseignant/notes/{note}', 'Enseignants\NotesController@choix')->name('enseignant.note.choix');
// Route::resource('enseignant/inscription', 'Enseignants\InscriptionsController');

Route::get('/', 'HomeController@index')->name('home');
