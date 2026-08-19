<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DossierController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

    Route::get('/Connexion', fn () => redirect()->route('login'));
    Route::get('/Register', fn () => redirect()->route('register'));

    // Keep old POST /Register compatible with the same Fortify flow.
    Route::post('/Register', [RegisteredUserController::class, 'store'])->name('signup.store');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')
    ->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', [ClientController::class, 'count'])->name('welcome');

    Route::get('/Clients', [ClientController::class, 'listerClient'])->name('clients');

    Route::get('/addClient', [ClientController::class, 'create'])->name('addCl');
    Route::post('/addClient', [ClientController::class, 'ajouterClient'])->name('addCl.store');
    Route::get('/infoClient/{id}', [ClientController::class, 'showClient'])->name('infoCl');
    Route::get('/modifierClient/{id}', [ClientController::class, 'updateClient'])->name('updateCl');
    Route::put('/modifierClient/{id}', [ClientController::class, 'update'])->name('updateCl.store');
    Route::delete('/supprimerClient/{id}', [ClientController::class, 'destroy'])->name('deleteCl');

    Route::get('/dossiers', [DossierController::class, 'index'])->name('dossiers');
    Route::get('/addDoss', [DossierController::class, 'create'])->name('addDoss');
    Route::post('/addDoss', [DossierController::class, 'store'])->name('addDoss.store');
    Route::get('/dossiers/{id}', [DossierController::class, 'show'])->name('dossiers.show');

    Route::get('/dossiers/{id}/edit', [DossierController::class, 'edit'])->name('dossiers.edit');
    Route::put('/dossiers/{id}', [DossierController::class, 'update'])->name('dossiers.update');
    Route::delete('/dossiers/{id}', [DossierController::class, 'destroy'])->name('dossiers.destroy');
    Route::get('/addUser', function () {return view('addUser'); })->name('addUse');
    Route::get('/profil', function () {return view('profil'); })->name('profil');
});
