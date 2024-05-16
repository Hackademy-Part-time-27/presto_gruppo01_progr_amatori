<?php

use App\Http\Controllers\AnnouncementController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::view('/','pages.index');

Route::get('/nuovo/annuncio', [AnnouncementController::class, 'create'])->middleware('auth')->name('announcements.create');
