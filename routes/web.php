<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/',[FrontController::class, 'welcome'])->name('welcome');

Route::get('/index',[AnnouncementController::class, 'index'])->name('announcements.index');

Route::get('/ricerca/annuncio', [FrontController::class, 'searchAnnouncements'])->name('announcements.search');

Route::get('/nuovo/annuncio', [AnnouncementController::class, 'create'])->middleware('auth')->name('announcements.create');

Route::get('/annuncio/{announcement}', [AnnouncementController::class, 'showAnnouncement'])->name('announcement.show');

Route::get('/categoria/{category}', [FrontController::class, 'categoryShow'])->name('categoryShow');

Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');

Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');

Route::post('/annuncio/{announcement}/revise', [RevisorController::class, 'reviseAgainAnnouncement'])->middleware('isRevisor')->name('announcement.revise');

Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

Route::get('/form/richiesta/revisore', [RevisorController::class, 'formRevisor'])->middleware('auth')->name('form.revisor');

Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

Route::post('/lingua/{lang}', [FrontController::class, 'setLanguage'])->name('set_language_locale');

