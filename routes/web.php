<?php

use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

// rotte public
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/search/article', [PublicController::class, 'searchArticles'])->name('article.search');
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');


// rott middleware
Route::middleware(['auth'])->group(function () {

    // rotte article

    Route::get('/create/article', [ArticleController::class, 'create'])->name('article.create');
    Route::get('/index/article', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/show/article/{article}', [ArticleController::class, 'show'])->name('article.show');
    Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');

    // rotte favorites
    Route::post('/articles/{id}/favorite', [FavoriteController::class, 'toggleFavorite'])->name('articles.favorite');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
});

// rotte revisore
Route::get('revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');
Route::patch('/annull/{article}', [RevisorController::class, 'annull'])->name('annull');
Route::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
