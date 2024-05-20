<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/',[FrontController::class, 'welcome'])->name('welcome');

Route::get('/nuovo/annuncio', [AnnouncementController::class, 'create'])->middleware('auth')->name('announcements.create');

Route::get('/annuncio/{announcement}', [AnnouncementController::class, 'showAnnouncement'])->name('announcement.show');

Route::get('/categoria/{category}', [FrontController::class, 'categoryShow'])->name('categoryShow');

Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');

Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');
