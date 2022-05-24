<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisiteurController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\ComposantController;
use App\Http\Controllers\RapportController;

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
    return view('home');
});

Route::get('/formLogin', [VisiteurController::class , 'getLogin']);
Route::post('/getConnexion', [VisiteurController::class , 'signIn']);
Route::get('/getLogout', [VisiteurController::class , 'signOut']);

Route::group(['prefix' => 'visiteur',  'middleware' => 'connect'], function()
{
    //Connexion

});

Route::group(['prefix' => 'medicament',  'middleware' => 'connect'], function()
{
    //Liste medicaments offerts
    Route::get('/getlisteMedicamentOffert', [MedicamentController::class,'getMedicamentsOffert']);
    //Supprimer Modifer medicament
    Route::get('/supprimerMedicamentOffert/{id_medicament}/{id_rapport}', [MedicamentController::class, 'suppMedicamentOffert']);
    Route::get('/modifierMedicaments/{id_medicament}/{id_rapport}', [MedicamentController::class, 'getFormModifMedicament']);
    Route::post('validerModifRapport',[MedicamentController::class,'modifMedicamentOffert']);


    //Liste medicament par famille
    Route::get('/getlisteMedicamentFamille', [MedicamentController::class, 'getFamille']);
    Route::get('/medicamentFamille/{id_famille}',[MedicamentController::class, 'getMedicamentsFamille']);


    //Recherche composants medicaments
    Route::get('/rechercheMedicament', [MedicamentController::class,'getMedicaments']);
    Route::get('/composantMedicament/{id}', [MedicamentController::class, 'getComposantMedicament']);
});

Route::group(['prefix' => 'composant',  'middleware' => 'connect'], function()
{
    //Ajouter, Supprimer, Modifier coposant
    Route::get('/supprimerCoposantMedicament/{id_composant}/{id_medicament}', [ComposantController::class, 'supprimerComposant']);
    Route::get('formComposant/{id_medicament}', [ComposantController::class,'getFormComposant']);
    Route::post('validerComposant', [ComposantController::class, 'addComposant']);
    Route::get('formModifComposant/{id_medicament}/{id_composant}', [ComposantController::class,'getFormModifComposant']);
    Route::post('modifComposant', [ComposantController::class,'modifComposant']);
});

Route::group(['prefix' => 'rapport',  'middleware' => 'connect'], function()
{
    //Recherche rapport de visite
    Route::get('/rechercheRapport',[RapportController::class,'getRapportVisite']);
    //ajout rapport de visite
    Route::get('formRapport', [RapportController::class,'getFormRapport']);
    Route::post('validerRapport', [RapportController::class, 'addRapport']);
});

