<?php

use App\Http\Controllers\AnnouncementsController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::view('/','pages.index');

Route::get('/nuovo/annuncio', [AnnouncementsController::class, 'create'])->name('announcements.create');
