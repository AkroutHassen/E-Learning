<?php

use Illuminate\Support\Facades\Route;
use App\Models\Cours;
use App\Models\Diplome;

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
    $cours=Cours::all();
    $diplome=Diplome::all();
    return view('Admin.welcome',compact(['cours','diplome']));
})->name('welcome');
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
Route::resource('admin/responsable','Admin\ResponsablesController');