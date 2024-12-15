<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () { return view('test');});

// ____________________________________________________________________________
Route::get('/',[ClientController::class,'count'])->name('welcome');

// ___________ Cennection ______________
Route::get('/Connexion', function () {return view('signin');})->name('singin');
Route::get('/Register', function () {return view('signup');})->name('signup');

// ___________ Client __________________
// Route::resource('clients', ClientController::class);
Route::get('/Clients',[ClientController::class,'listerClient'])->name('clients');
Route::get('/addClient', function () {return view('addClient');})->name('addCl');
Route::get('/addClient',[ClientController::class,'create'])->name('addCl');
Route::post('/addClient',[ClientController::class,'ajouterClient'])->name('addCl');
Route::get('/infoClient/{id}',[ClientController::class,'showClient'])->name('infoCl');
Route::get('/modifierClient/{id}',[ClientController::class,'updateClient'])->name('updateCl');
Route::post('/modifierClient/{id}',[ClientController::class,'update'])->name('updateCl');

Route::get('/addUser', function () {return view('addUser');})->name('addUse');
Route::get('/profil', function () {return view('profil');})->name('profil');
Route::get('/dossiers', function () {return view('dossier');})->name('dossiers');
Route::get('/addDoss', function () {return view('addDoss');})->name('addDoss');