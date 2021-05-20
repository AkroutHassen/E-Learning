<?php

use Illuminate\Support\Facades\Route;
// use App\Models\Cours;
// use App\Models\Diplome;
// use App\Models\Groupe;

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

Route::get('/','Admin\StatistiquesController@index')->name('welcome');
    
Route::get('/Enseignants', function () {
    return view('Enseignants.layouts.template');
});
Route::get('/Etudiants', function () {
    return view('Etudiants.layouts.template');
});
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
