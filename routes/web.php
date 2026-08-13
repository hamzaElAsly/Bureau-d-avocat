<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DossierController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () { return view('test');});

// ____________________________________________________________________________
Route::get('/', [ClientController::class, 'count'])->name('welcome');

// ___________ Cennection ______________
Route::get('/Connexion', function () {return view('signin');})->name('singin');
Route::get('/Register', function () {return view('signup');})->name('signup');

// ___________ Client __________________
Route::get('/Clients', [ClientController::class, 'listerClient'])->name('clients');
Route::get('/addClient', [ClientController::class, 'create'])->name('addCl');
Route::post('/addClient', [ClientController::class, 'ajouterClient'])->name('addCl.store');
Route::get('/infoClient/{id}', [ClientController::class, 'showClient'])->name('infoCl');
Route::get('/modifierClient/{id}', [ClientController::class, 'updateClient'])->name('updateCl');
Route::post('/modifierClient/{id}', [ClientController::class, 'update'])->name('updateCl.store');
Route::delete('/supprimerClient/{id}', [ClientController::class, 'destroy'])->name('deleteCl');

// ___________ Dossiers ________________
Route::get('/dossiers', [DossierController::class, 'index'])->name('dossiers');
Route::get('/addDoss', [DossierController::class, 'create'])->name('addDoss');
Route::post('/addDoss', [DossierController::class, 'store'])->name('addDoss.store');
Route::get('/dossiers/{id}', [DossierController::class, 'show'])->name('dossiers.show');
Route::get('/dossiers/{id}/edit', [DossierController::class, 'edit'])->name('dossiers.edit');
Route::post('/dossiers/{id}/edit', [DossierController::class, 'update'])->name('dossiers.update');
Route::delete('/dossiers/{id}', [DossierController::class, 'destroy'])->name('dossiers.destroy');

Route::get('/addUser', function () { return view('addUser'); })->name('addUse');
Route::get('/profil', function () { return view('profil'); })->name('profil');