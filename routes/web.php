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
Route::get('enseignant/note', 'Enseignants\NotesController@index')->name('enseignant.note.index');
Route::post('enseignant/note/{id}/{resp}', 'Enseignants\NotesController@store')->name('enseignant.note.store');
Route::put('enseignant/note/{note}/{resp}', 'Enseignants\NotesController@update')->name('enseignant.note.update');
Route::get('enseignant/notes/{idCours}/{resp}', 'Enseignants\NotesController@choix')->name('enseignant.note.choix');
// Route::resource('enseignant/inscription', 'Enseignants\InscriptionsController');

Route::get('/', 'HomeController@index')->name('home');


// Les routes de l'admin
Route::resource('admin/etudiant','Admin\EtudiantsController');
Route::resource('admin/diplome','Admin\DiplomesController');
Route::resource('admin/enseignant','Admin\EnseignantsController');
Route::resource('admin/cours','Admin\CoursController');
Route::resource('admin/groupe','Admin\GroupesController');
Route::resource('admin/affecter','Admin\AffecteretudiantsController');

Route::get('admin/responsablecours/created','Admin\ResponsablecoursController@created')->name('responsablecours.created');
Route::post('admin/responsablecours/stored','Admin\ResponsablecoursController@stored')->name('responsablecours.stored');

Route::resource('admin/responsablecours','Admin\ResponsablecoursController');
Route::get('admin/responsablecours/create/{n}','Admin\ResponsablecoursController@create')->name('responsablecours.create');
Route::put('admin/responsablecours/{n}/updated','Admin\ResponsablecoursController@updated')->name('responsablecours.updated');
Route::get('admin/responsablecours/{n}/editd','Admin\ResponsablecoursController@editd')->name('responsablecours.editd');



Route::get('admin/responsabletd/created','Admin\ResponsabletdsController@created')->name('responsabletd.created');
Route::post('admin/responsabletd/stored','Admin\ResponsabletdsController@stored')->name('responsabletd.stored');

Route::resource('admin/responsabletd','Admin\ResponsabletdsController');
Route::get('admin/responsabletd/create/{n}','Admin\ResponsabletdsController@create')->name('responsabletd.create');
Route::put('admin/responsabletd/{n}/updated','Admin\ResponsabletdsController@updated')->name('responsabletd.updated');
Route::get('admin/responsabletd/{n}/editd','Admin\ResponsabletdsController@editd')->name('responsabletd.editd');


Route::get('welcome','Admin\StatistiquesController@index')->name('welcome');
    
// Route::get('/Enseignants', function () {
//     return view('Enseignants.layouts.template');
// });
// Route::get('/Etudiants', function () {
//     return view('Etudiants.layouts.template');
// });