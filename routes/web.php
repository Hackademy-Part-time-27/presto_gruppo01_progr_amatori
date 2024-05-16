<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AnnouncementController;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/',[FrontController::class, 'welcome'])->name('welcome');

Route::get('/nuovo/annuncio', [AnnouncementController::class, 'create'])->middleware('auth')->name('announcements.create');

Route::get('/annuncio/{announcement}', [AnnouncementController::class, 'showAnnouncement'])->name('announcement.show');
